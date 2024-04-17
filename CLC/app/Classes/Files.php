<?php

namespace App\Classes;

use Illuminate\Http\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

set_time_limit(270);

class Files
{
    public static $error = false;
    public static $apiName = false;
    public static $apiValue = false;
    public static $convert_to_webp = false;

    public static function substrName($str, $length = 200)
    {
        $str = substr($str, 0, $length);
        $str_last = mb_substr($str, -1, 1);

        if (strlen($str_last) == 1 && !mb_detect_encoding($str_last, 'ASCII', true)) {
            $length--;
            $str = substr($str, 0, $length);
            return self::substrName($str, $length);
        }

        return $str;
    }

    public static function formatValidate($files, $formats)
    {
        foreach ($files as $file) {
            if (strpos($file, 'http') === false) {
                if (is_object($file)) {
                    $extension = $file->extension();
                } else {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                }

                if (
                    !isset($extension) ||
                    !in_array(
                        strtolower($extension),
                        $formats
                    )
                ) {
                    self::$error = 'Поддерживаемые форматы: ' . implode(', ', $formats);
                    return false;
                }
            }
        }

        return true;
    }

    public static function requestThumb($thumb, $request = false, $input_name = false)
    {
        return
            $input_name && $request
            ? (isset($request[$input_name . '_thumb'][ThumbName($thumb)])
                ? $request[$input_name . '_thumb'][ThumbName($thumb)]
                : null)
            : null;
    }

    public static function thumbs($file_url, $thumbs, $sharpen = 8, $request = false, $input_name = false)
    {
        if ($thumbs && file_exists($_SERVER['DOCUMENT_ROOT'] . $file_url)) {
            $formatValidate = self::formatValidate([$file_url], ['jpg', 'jpeg', 'webp', 'png', 'gif']);
            if (!$formatValidate) {
                return false;
            }

            $filename = self::filename($file_url);
            $extension = '.' . pathinfo($file_url, PATHINFO_EXTENSION);
            $filenameNotExt = str_replace($extension, '', $filename);

            if (self::$convert_to_webp) {
                Image::make($_SERVER['DOCUMENT_ROOT'] . $file_url)
                    ->orientate()
                    ->save(
                        $_SERVER['DOCUMENT_ROOT'] . str_replace(
                            $extension,
                            '.webp',
                            $file_url
                        ),
                        100
                    )->destroy();

                if (strtolower($extension) != '.webp') {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $file_url));
                }

                $file_url = str_replace($extension, '.webp', $file_url);
            }

            foreach ($thumbs as $thumb) {
                $requestThumb = self::requestThumb($thumb, $request, $input_name);

                if ($requestThumb) {
                    $img = Image::make($requestThumb);
                } else {
                    $img = Image::make($_SERVER['DOCUMENT_ROOT'] . $file_url);
                }

                if ($img) {
                    if (!$requestThumb) {
                        if (isset($thumb[1])) {
                            $img->fit($thumb[0], $thumb[1], function ($img) {
                                $img->upsize();
                            }, 'top');
                        } else {
                            $img->resize($thumb[0], null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                    }

                    if ($sharpen) {
                        $img->sharpen($sharpen);
                    }

                    $img->save(
                        $_SERVER['DOCUMENT_ROOT'] . str_replace(
                            $filenameNotExt,
                            $thumb[0] . '_' . $filenameNotExt,
                            $file_url
                        ),
                        100
                    );
                    $img->destroy();
                }
            }
        }

        return $file_url;
    }

    public static function copy($files_input, $path, $thumbs = [], $sharpen = 8)
    {
        self::$error = '';

        if ($files_input) {
            $result = [];

            $files = is_array($files_input)
                ? $files_input
                : [$files_input];

            if ($thumbs) {
                $formatValidate = self::formatValidate($files, ['jpg', 'jpeg', 'webp', 'png', 'gif']);
                if (!$formatValidate) {
                    return false;
                }
            }

            foreach ($files as $file) {
                if (strpos($file, 'http') === false) {
                    if (!file_exists($file)) {
                        $file = storage_path() . '/app/public/' . str_replace('/storage/', '', $file);
                    }

                    $file_path = Storage::disk('public')
                        ->put($path, new File($file), 'public');
                } else {
                    $basename = basename($file);

                    if (strpos($basename, '.') !== false) {
                        $basename_arr = explode('.', $basename);
                        if (end($basename_arr) == '') {
                            $basename .= 'txt';
                        }
                    } else {
                        $basename .= '.txt';
                    }

                    $basename = explode('?', $basename);
                    $basename = $basename[0];

                    if (self::$apiValue && self::$apiName) {
                        $file_data = Http::withHeaders([
                            self::$apiName => self::$apiValue,
                        ])->get($file);
                    } else {
                        $file_data = Http::get($file);
                    }

                    if ($file_data) {
                        $file_path_tmp = Storage::disk('public')
                            ->put($basename, $file_data, 'public');
                        $file_path_tmp = storage_path() . '/app/public/' . $basename;
                        $file_path = Storage::disk('public')
                            ->put($path, new File($file_path_tmp), 'public');
                        unlink($file_path_tmp);
                    }
                }

                if (isset($file_path)) {
                    $file_url = Storage::url($file_path);

                    $file_url_new = self::thumbs($file_url, $thumbs, $sharpen);

                    if ($file_url_new) {
                        $result[] = $file_url_new;
                    } else {
                        self::$error = 'Не смог создать миниатюры';
                        $file_url = str_replace('/storage/', '', $file_url);
                        Storage::disk('public')->delete($file_url);
                    }
                }
            }

            return $result;
        }

        return false;
    }

    public static function put($path, $file, $originalName = false, $hashName = true)
    {
        if ($originalName) {
            $path_store = $path . ($hashName ? '/' . str_replace('.' . $file->extension(), '', $file->hashName()) : '');
            $name_store = self::substrName(
                str_replace('.' . $file->extension(), '', $file->getClientOriginalName())
            ) . '.' . $file->extension();

            if (!$hashName) {
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/storage/' . $path_store . '/' . $name_store)) {
                    self::$error = 'Такой файл уже существует';
                    return false;
                }
            }

            return $file->storeAs($path_store, $name_store, 'public');
        }

        return Storage::disk('public')->put($path, $file, 'public');
    }

    public static function saveBase64($base64, $path, $thumbs = [], $sharpen = 8)
    {
        $result = [];

        $files = is_array($base64)
            ? $base64
            : [$base64];

        foreach ($files as $file) {
            if (preg_match('/^data:image\/(\w+);base64,/', $file, $type)) {
                $file = substr($file, strpos($file, ',') + 1);
                $type = strtolower($type[1]);

                if (in_array($type, ['jpg', 'jpeg', 'webp', 'png', 'gif'])) {
                    $file_path = $path . '/' . Str::random(40) . '.webp';

                    Storage::disk('public')->put(
                        $file_path,
                        base64_decode($file),
                        'public'
                    );

                    $file_url = '/storage/' . $file_path;

                    $file_url_new = false;
                    try {
                        $file_url_new = self::thumbs($file_url, $thumbs, $sharpen);
                    } catch (\Exception $e) {
                    }

                    if ($file_url_new) {
                        $result[] = $file_url_new;
                    } else {
                        $file_url = str_replace('/storage/', '', $file_url);
                        Storage::disk('public')->delete($file_url);
                    }
                }
            }
        }

        return is_array($base64)
            ? $result
            : ($result ? $result[0] : $result);
    }

    public static function save($file_source, $path, $thumbs = [], $sharpen = 8)
    {
        $result = [];

        $files = is_array($file_source) ? $file_source : [$file_source];

        if ($thumbs) {
            $formatValidate = self::formatValidate($files, ['jpg', 'jpeg', 'webp', 'png', 'gif']);
            if (!$formatValidate) {
                return false;
            }
        }

        foreach ($files as $file) {
            $file_path = self::put($path, $file, isset($request['originalName']), !isset($request['hashNameOff']));

            $file_url = $file_path ? Storage::url($file_path) : false;

            $file_url_new = self::thumbs($file_url, $thumbs, $sharpen);

            if ($file_url_new) {
                $result[] = $file_url_new;
            } else {
                $file_url = str_replace('/storage/', '', $file_url);
                Storage::disk('public')->delete($file_url);
            }
        }

        return is_array($file_source)
            ? $result
            : ($result ? $result[0] : $result);
    }

    public static function upload($request, $input_name, $path, $thumbs = [], $sharpen = 8)
    {
        if ($request->hasFile($input_name)) {
            $result = [];

            $files = is_array($request->$input_name)
                ? $request->$input_name
                : [$request->$input_name];

            if ($thumbs) {
                $formatValidate = self::formatValidate($files, ['jpg', 'jpeg', 'webp', 'png', 'gif']);
                if (!$formatValidate) {
                    return false;
                }
            }

            foreach ($files as $file) {
                $file_path = self::put($path, $file, isset($request['originalName']), !isset($request['hashNameOff']));

                $file_url = $file_path ? Storage::url($file_path) : false;

                $file_url_new = self::thumbs($file_url, $thumbs, $sharpen, $request, $input_name);

                if ($file_url_new) {
                    $result[] = $file_url_new;
                } else {
                    $file_url = str_replace('/storage/', '', $file_url);
                    Storage::disk('public')->delete($file_url);
                }
            }

            return is_array($request->$input_name)
                ? $result
                : ($result ? $result[0] : $result);
        }

        return false;
    }

    public static function filename($file_url)
    {
        $filename = explode('/', $file_url);
        return end($filename);
    }

    public static function thumbs_delete($paths, $thumbs = [])
    {
        if ($paths) {
            $paths = is_array($paths) ? $paths : [$paths];

            foreach ($paths as $item) {
                if (is_array($item)) continue;

                $item = str_replace('/storage/', '', $item);

                if ($thumbs) {
                    foreach ($thumbs as $thumb) {
                        $filename = self::filename($item);

                        Storage::disk('public')
                            ->delete(str_replace(
                                $filename,
                                $thumb[0] . '_' . $filename,
                                $item
                            ));
                    }
                }
            }
        }
    }

    public static function delete($paths, $thumbs = [], $options = [])
    {
        $delete = false;

        if ($paths) {
            self::thumbs_delete($paths, $thumbs);

            $paths = is_array($paths) ? $paths : [$paths];

            foreach ($paths as $item) {
                if (!is_array($item)) {
                    $delete = Storage::disk('public')->delete(str_replace('/storage/', '', $item));

                    $hashFolder = self::hashFolder(str_replace('/storage/', '', $item));
                    if ($hashFolder) {
                        $delete = Storage::disk('public')->deleteDirectory($hashFolder);
                    }

                    if ($options) {
                        $key_first = array_key_first($options);
                        $options[$key_first][$key_first] = self::newFilesArray($options[$key_first][$key_first], $item);
                        $options[$key_first]->save();
                    }
                }
            }
        }

        return $delete;
    }

    public static function originalName($str)
    {
        if (strpos($str, '/') === false) return null;

        $str_arr = explode('/', $str);
        $name = end($str_arr);

        return strlen($str_arr[count($str_arr) - 2]) == 40 ? $name : null;
    }

    public static function hashFolder($str)
    {
        if (strpos($str, '/') === false) return null;

        $str_arr = explode('/', $str);

        if (strlen($str_arr[count($str_arr) - 2]) == 40) {
            $name = end($str_arr);
            $folder = explode('/' . $name, $str);

            return $folder[0];
        }

        return null;
    }

    public static function newFilesArray($files, $delete)
    {
        if (!is_array($files)) return null;

        $new_array = [];

        $delete = is_array($delete) ? $delete : [$delete];

        foreach ($files as $file) {
            if (!in_array($file, $delete)) {
                $new_array[] = $file;
            }
        }

        return $new_array ? $new_array : null;
    }

    public static function removeFile($request, $Model)
    {
        if ($request->has('file_delete') && $request->has('field') && $request->has('id')) {
            $Model = $Model::find($request->id);

            $field_arr = explode('[', $request->field);
            foreach ($field_arr as $key => $val) {
                $val = trim(str_replace(']', '', $val));

                if ($val) {
                    $field_arr[$key] = $val;
                } else {
                    unset($field_arr[$key]);
                }
            }

            $result = null;

            $files = is_array($request->file_delete) ? $request->file_delete : [$request->file_delete];

            if (count($field_arr) > 1) {
                $result = $Model[$field_arr[0]];

                if (isset($result[$field_arr[1]])) {
                    $result[$field_arr[1]] = self::newFilesArray($result[$field_arr[1]], $files);
                } else {
                    foreach ($files as $file) {
                        foreach ($result as $key => $item) {
                            if (isset($item[$field_arr[1]]) && $item[$field_arr[1]] == $file) {
                                $result[$key][$field_arr[1]] = self::newFilesArray($result[$key][$field_arr[1]], $files);
                                break;
                            }
                        }
                    }
                }
            } else {
                $result = self::newFilesArray($Model[$field_arr[0]], $files);
            }

            $Model[$field_arr[0]] = $result;
            $Model->save();

            Files::delete($request->file_delete, (isset($Model::$thumbs) ? $Model::$thumbs : null));

            return true;
        }

        return false;
    }

    public static function recreateThumbs($files, $old_thumbs, $new_thumbs)
    {
        foreach ($files as $file) {
            $file_public_path = public_path($file);

            if (file_exists($file_public_path)) {
                $name_arr = explode('/', $file_public_path);
                $name = end($name_arr);
                $path = str_replace($name, '', $file_public_path);

                foreach ($old_thumbs as $old_thumb) {
                    $old_thumb_file = $path . $old_thumb . '_' . $name;

                    if (file_exists($old_thumb_file)) {
                        unlink($old_thumb_file);
                    }
                }

                $no_exists_thumbs = [];

                foreach ($new_thumbs as $new_thumb) {
                    $new_thumb_file = $path . $new_thumb[0] . '_' . $name;

                    if (!file_exists($new_thumb_file)) {
                        $no_exists_thumbs[] = $new_thumb;
                    }
                }

                self::thumbs($file, $no_exists_thumbs);
            }
        }
    }
}
