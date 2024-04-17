<?php

namespace App\Classes;

use Illuminate\Support\Facades\File;
use stdClass;

class Constructor
{
    public $name = null;
    public $sort = null;
    public $fields = null;
    public $oldData = null;
    public $pollAnswers = [];

    public function __construct($name, $oldData = null)
    {
        $this->name = $name;
        $this->sort = request($name . '_sort') ? explode(',', request($name . '_sort')) : [];

        if ($oldData) {
            $this->oldData = $oldData;
        }

        $this->fields = $this->getFields();
    }

    public function filesUpload($array)
    {
        if ($this->fields) {
            foreach ($this->fields as $key => $field) {
                $name = array_key_first($field);
                $value = $field[$name];

                if (is_object($value)) {
                    if (File::isFile($value)) {
                        Files::$convert_to_webp = false;

                        $thumbs = isset($array['thumbs']) ? $array['thumbs'] : [];

                        $value = is_array($value) ? $value : [$value];
                        if (!Files::formatValidate($value, ['jpg', 'jpeg', 'webp', 'png', 'gif'])) {
                            $thumbs = [];
                        }

                        $files = Files::save(
                            $value,
                            $array['path'],
                            $thumbs,
                            isset($array['sharpen']) ? $array['sharpen'] : 8
                        );

                        if ($files) {
                            $this->fields[$key][$name] = $files;
                        } else {
                            unset($this->fields[$key]);
                        }

                        $this->removeFiles($name, $thumbs);
                    }
                }
            }
        }

        $this->removeTrashFiles($array);
    }

    public function removeImages($thumbs)
    {
        if ($this->oldData) {
            foreach ($this->oldData as $item) {
                $name = array_key_first($item);

                if (strpos($name, 'image_') !== false) {
                    $images = is_array($item[$name]) ? $item[$name] : [$item[$name]];
                    Files::delete($images, $thumbs);
                }
            }
        }
    }

    public static function normalizeData($oldData, $options = [])
    {
        $constructor = new self('content', $oldData);

        if (isset($options['pollAnswers']) && $options['pollAnswers']) {
            $constructor->pollAnswers = $options['pollAnswers'];
        }

        return $constructor->normalize();
    }

    public function normalize()
    {
        $result = new stdClass();

        if ($this->oldData) {
            if (is_array($this->oldData)) {
                foreach ($this->oldData as $key => $item) {
                    $key = array_key_first($item);

                    $type = explode('_', $key);
                    $type = $type[0];

                    $value = $item[$key];
                    if (is_array($value) && count($value) == 1) {
                        $value = $value[0];
                    }

                    if ($type == 'poll') {
                        if (!$value['question']) continue;
                        $value = $this->getPollValue($value, $key);
                        $value['id'] = $key;
                        $value['isVoice'] = isset($_COOKIE[$key . '_voice']);
                    }

                    if ($type == 'video') {
                        $value = $this->getVideoCode($value);
                    }

                    $object = new stdClass();
                    $object->type = $type;
                    $object->value = $value;

                    $result->$key = $object;
                }
            } else {
                $object = new stdClass();
                $object->type = 'texteditor';
                $object->value = $this->oldData;
                $result->text = $object;
            }
        }

        return $result;
    }

    public function getVideoCode($value)
    {
        if (strpos($value, 'iframe') === false) {
            if (strpos($value, 'youtu') !== false) {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $value, $match);
                $value = '<iframe src="https://www.youtube.com/embed/' . $match[1] . '"></iframe>';
            } else if (strpos($value, 'ok.ru') !== false && strpos($value, 'video/') !== false) {
                $valueArr = explode('video/', $value);
                $value = '<iframe src="https://ok.ru/videoembed/' . $valueArr[1] . '"></iframe>';
            } else if (strpos($value, 'vimeo.com') !== false && strpos($value, 'player') === false) {
                $valueArr = explode('vimeo.com/', $value);
                $value = '<iframe src="https://player.vimeo.com/video/' . $valueArr[1] . '"></iframe>';
            } else {
                $value = '<iframe src="' . $value . '"></iframe>';
            }
        }

        return $value;
    }

    public function addVoicePoll($id, $key)
    {
        if ($this->oldData) {
            setcookie($id . '_voice', true, time() + 604800, '/');

            $count = count($this->oldData);

            for ($i = 0; $i < $count; $i++) {
                if (isset($this->oldData[$i][$id]['count'])) {
                    if (
                        isset($this->oldData[$i][$id]['count'][$key]) &&
                        is_numeric($this->oldData[$i][$id]['count'][$key])
                    ) {
                        $this->oldData[$i][$id]['count'][$key]++;
                    } else {
                        $this->oldData[$i][$id]['count'][$key] = 1;
                    }
                }
            }
        }

        return $this->oldData;
    }

    private function getPollValue($value, $id)
    {
        $result = [
            'question' => $value['question'],
            'type' => 'radio',
            'description' => 'Выберите, пожалуйста, один ответ.',
            'variants' => [],
            'isMulti' => isset($value['is_multi']) && $value['is_multi'],
            'isUserVariant' => isset($value['is_user_variant']) && $value['is_user_variant']
        ];

        $sum = 0;

        if (isset($value['variant']) && is_array($value['variant'])) {
            foreach ($value['variant'] as $key => $text) {
                $count = isset($value['count'][$key]) ? (int)$value['count'][$key] : 0;

                $sum = $sum + $count;

                if ($text) {
                    $checked = false;

                    if (isset($this->pollAnswers[$id])) {
                        if (is_array($this->pollAnswers[$id])) {
                            if (in_array('' . $key . '', $this->pollAnswers[$id])) {
                                $checked = true;
                            }
                        } else {
                            if ((int) $this->pollAnswers[$id] == $key) {
                                $checked = true;
                            }
                        }
                    }

                    $result['variants'][] = [
                        'id' => $id . '_' . $key,
                        'text' => $text,
                        'count' => $count,
                        'checked' => $checked,
                    ];
                }
            }
        }

        foreach ($result['variants'] as &$variant) {
            $variant['percent'] = $sum && $variant['count']
                ? round(100 / ($sum / $variant['count']))
                : 0;
        }

        if ($result['isMulti']) {
            $result['description'] = 'Выберите, пожалуйста, один или несколько ответов.';
            $result['type'] = 'checkbox';
        } else if (!$result['variants'] && $result['isUserVariant']) {
            $result['description'] = 'Вариант ответа в свободной форме.';
            $result['value'] = isset($this->pollAnswers[$id]) ? $this->pollAnswers[$id] : '';
        }

        return $result;
    }

    private function getFields()
    {
        $result = null;

        $request_fields = request($this->name);

        if ($request_fields) {
            $result = [];

            foreach ($request_fields as $name => $value) {
                $id = substr($name, strpos($name, '_') + 1);
                $key = array_search($id, $this->sort);

                if ($key !== false) {
                    $result[$key] = [
                        $name => $value
                    ];
                }
            }

            foreach ($this->sort as $key => $id) {
                if (!isset($result[$key])) {
                    $getModelItem = $this->getModelItem($id);

                    if ($getModelItem) {
                        $result[$key] = $getModelItem;
                    }
                }
            }

            ksort($result);

            $result = array_values($result);
        }

        return $result;
    }

    private function getModelItem($id)
    {
        $result = null;

        if ($this->oldData) {
            foreach ($this->oldData as $field) {
                $name = array_key_first($field);

                if (strpos($name, $id) !== false) {
                    $result = $field;
                    break;
                }
            }
        }

        return $result;
    }

    public function removeTrashFiles($array)
    {
        if (is_array($this->oldData) && $this->oldData) {
            $thumbs = isset($array['thumbs']) ? $array['thumbs'] : [];

            foreach ($this->oldData as $item) {
                if (is_array($item)) {
                    $name = array_key_first($item);

                    if (isset($item[$name])) {
                        $value = $item[$name];

                        if (is_string($value)) {
                            if (strpos($value, 'storage') !== false) {
                                $id = substr($name, strpos($name, '_') + 1);

                                if (!in_array($id, $this->sort)) {
                                    Files::delete($value, $thumbs);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    private function removeFiles($name, $thumbs)
    {
        if ($this->oldData) {
            foreach ($this->oldData as $item) {
                if (isset($item[$name])) {
                    Files::delete($item[$name], $thumbs);
                }
            }
        }
    }
}
