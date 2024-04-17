<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Classes\Filter;
use App\Helpers\AdminFileDelete;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        AdminFileDelete::heandle(new Lesson());

        $items = Lesson::orderBy('number', 'asc');

        $items = Filter::apply([
            'id', 'name', 'shortName', 'image', 'description', 'video', 'task', 'start_at', 'course_id',
            'contents', 'links', 'presentation', 'duration', 'number'
        ], $request, $items);

        return [
            'paginate' => $items->paginate(50),
            'course' => Course::all()
        ];
    }

    public function before($request)
    {
        if ($request->has('start_at')) {
            $request['start_at'] = Carbon::parse($request->start_at)->format('Y-m-d H:i:s');
        }

        if ($request->has('speaker')) {
            $request['speaker'] = getHtmlArray($request->speaker);
        }

        return $request;
    }

    public function store(Request $request)
    {
        $request = $this->before($request);

        $validator = Validator::make($request->all(), [
            'number' => 'required|numeric',
            'start_at' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $Lesson = Lesson::create($request->all());

        $this->after($request, $Lesson);

        return ['success' => $this->edit($Lesson->id)];
    }

    public function edit($id)
    {
        return Lesson::find($id);
    }

    public function update(Request $request, $id)
    {
        $request = $this->before($request);

        $Lesson = Lesson::find($id);

        $validator_arr = [];

        foreach ([
            'number' => 'required|numeric',
            'start_at' => 'required',
            'course_id' => 'required|exists:courses,id',
        ] as $key => $valid) {
            if ($request->has($key)) {
                $validator_arr[$key] = $valid;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $SpeakersOld = $Lesson->speaker;

        $Lesson->update($request->all());

        $this->after($request, $Lesson, $SpeakersOld);

        return ['success' => $this->edit($Lesson->id)];
    }

    public function after($request, $Lesson, $SpeakersOld = null)
    {
        Files::$convert_to_webp = false;

        $video = Files::upload($request, 'video', 'lesson_video');

        if ($video) {
            Files::delete($Lesson->video);
            $Lesson->video = $video;
            $Lesson->save();
        }

        $image = Files::upload($request, 'image', 'lesson_image', Lesson::$thumb);

        if ($image) {
            Files::delete($Lesson->image, Lesson::$thumb);
            $Lesson->image = $image;
            $Lesson->save();
        }

        $presentation = Files::upload($request, 'presentation', 'lesson_presentation');

        if ($presentation) {
            Files::delete($Lesson->presentation);
            $Lesson->presentation = $presentation;
            $Lesson->save();
        }

        if ($request->has('speaker') && $request->speaker) {
            $speaker = [];

            foreach ($request->speaker as $key => $item) {
                if ($key === 'photo') {
                    continue;
                }

                $speaker[$key] = $item;

                if ($request->hasFile('speaker.photo.' . $key)) {
                    $photo = Files::upload($request, 'speaker.photo.' . $key, 'lesson_speaker_photo', Lesson::$speaker_thumb);
                    if ($photo) {
                        if (isset($SpeakersOld[$key]['photo'])) {
                            Files::delete($SpeakersOld[$key]['photo'], Lesson::$speaker_thumb);
                        }

                        $speaker[$key]['photo'] = $photo;
                    }
                } else {
                    $speaker[$key]['photo'] = isset($SpeakersOld[$key]['photo'])
                        ? $SpeakersOld[$key]['photo']
                        : null;
                }
            }

            $Lesson->speaker = $speaker;
            $Lesson->save();
        }
    }

    public function destroy($id)
    {
        $Lesson = Lesson::find($id);

        if ($Lesson->speaker) {
            foreach ($Lesson->speaker as $item) {
                if ($item['photo']) {
                    Files::delete($item['photo'], Lesson::$speaker_thumb);
                }
            }
        }

        Files::delete($Lesson->image, Lesson::$thumb);
        Files::delete($Lesson->video);
        Files::delete($Lesson->presentation);

        Lesson::destroy($id);

        return ['success' => true];
    }
}
