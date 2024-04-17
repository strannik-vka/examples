<?php

namespace App\Helpers;

use App\Models\Lesson;
use App\Models\Notification;
use App\Models\Test;

class NotificationHelper
{
    public static function typeData($notification)
    {
        $TYPES = [
            1 => [
                'title' => 'Конкурс стартовал',
                'description' => 'Конкурс лидеров креативных команд',
                'url' => route('leadership.contest'),
                'url_text' => 'Участвовать'
            ],
            2 => [
                'title' => 'Итоги конкурса',
                'description' => 'Конкурс CLC 2023 подошел к концу',
                'url' => route('leadership.contest.result'),
                'url_text' => 'Подробнее'
            ],
            3 => [
                'description' => 'Мы запустили курс по креативному лидерству',
                'url_text' => 'Подробнее'
            ],
            4 => [
                'title' => '',
                'description' => '',
                'url_text' => 'Учиться'
            ],
            5 => [
                'title' => 'Поздравляем!',
                'description' => 'Вы прошли курс',
                'url_text' => 'Сертификат'
            ],
            6 => [
                'title' => '',
                'description' => '',
                'url_text' => 'Учиться'
            ],
            7 => [
                'title' => 'Новый отклик на ДЗ',
                'description' => 'Вам оставили комментарий к домашнему заданию',
                'url_text' => 'Подробнее'
            ],
        ];

        $typeData = (object) $TYPES[$notification->type_id];

        if ($notification->notificateable) {
            if ($notification->type_id == 3) {
                $typeData->title = '«' . $notification->notificateable->name . '»';
                $typeData->url = route('course.show', $notification->notificateable->id);
            }

            if ($notification->type_id == 4) {
                if ($notification->notificateable->lessonBlock) {
                    $typeData->title = 'Открыт ' . $notification->notificateable->lessonBlock->number . ' блок курса';
                }

                $typeData->url = route('lesson.show', $notification->notificateable->id);

                if ($notification->notificateable->course) {
                    $typeData->description = '«' . $notification->notificateable->course->name . '»';
                }
            }

            if ($notification->type_id == 5) {
                $typeData->description .= ' «' . $notification->notificateable->name . '»';
                $typeData->url = route('course.certificate.show', $notification->notificateable->id);
            }

            if ($notification->type_id == 6) {
                $typeData->title = 'Открыт ' . $notification->notificateable->number . ' урок курса';

                if ($notification->notificateable->course) {
                    $typeData->description = '«' . $notification->notificateable->course->name . '»';
                }

                $typeData->url = route('course.show', $notification->notificateable->course_id) . '?lesson_id=' . $notification->notificateable->id;
            }

            if ($notification->type_id == 7) {
                $test = Test::with('lesson')->find($notification->notificateable->test_id);

                $typeData->url = route('course.show', $test->lesson->course_id) . '?lesson_id=' . $test->lesson->id . '#comment';
            }
        }

        return $typeData;
    }

    public static function newLessons()
    {
        $user = request()->user();

        $lessons = Lesson::select('id', 'number')
            ->whereDoesntHave('notification', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('start_at', '<=', date('Y-m-d H:i:s'))->orderBy('start_at', 'asc')->get();

        if (count($lessons)) {
            foreach ($lessons as $lesson) {
                if ($lesson->number > 0) {
                    Notification::create([
                        'is_read' => 0,
                        'user_id' => $user->id,
                        'type_id' => 6,
                        'notificateable_id' => $lesson->id,
                        'notificateable_type' => 'App\Models\Lesson',
                    ]);
                }
            }
        }
    }
}
