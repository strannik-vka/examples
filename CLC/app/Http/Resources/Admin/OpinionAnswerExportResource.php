<?php

namespace App\Http\Resources\Admin;

use App\Helpers\OpinionHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class OpinionAnswerExportResource extends JsonResource
{
    public function toArray($request)
    {
        $industries = [];

        if (isset($this->user_data['poll_0991626936275448']) && is_array($this->user_data['poll_0991626936275448'])) {
            foreach ($this->user_data['poll_0991626936275448'] as $industry_id) {
                $industry = OpinionHelper::getIndustry($industry_id);

                if (isset($industry['name'])) {
                    $industries[] = $industry['name'];
                }
            }
        }


        return [
            'opinion' => isset($this->opinion->name) ? $this->opinion->name : '',
            'user' => isset($this->user->name) ? $this->user->name : '',
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : '',

            'name' => isset($this->user_data['poll_038716914406120706']) ? $this->user_data['poll_038716914406120706'] : '',
            'contact' => isset($this->user_data['poll_097075191630082']) ? $this->user_data['poll_097075191630082'] : '',
            'city' => isset($this->user_data['poll_07445847395792098']) ? $this->user_data['poll_07445847395792098'] : '',
            'work' => isset($this->user_data['poll_06984246510583738']) ? $this->user_data['poll_06984246510583738'] : '',
            'industry' => implode(', ', $industries),

            'answer_1' => isset($this->answer_data['poll_07474980454176519']) ? $this->answer_data['poll_07474980454176519'] : '',
            'answer_2' => isset($this->answer_data['poll_022008834969591007']) ? $this->answer_data['poll_022008834969591007'] : '',
            'answer_3' => isset($this->answer_data['poll_02550383300690009']) ? $this->answer_data['poll_02550383300690009'] : '',
            'answer_4' => isset($this->answer_data['poll_027946066775601763']) ? $this->answer_data['poll_027946066775601763'] : '',
            'answer_5' => isset($this->answer_data['poll_03985009644031934']) ? $this->answer_data['poll_03985009644031934'] : '',
            'answer_6' => isset($this->answer_data['poll_08020551115586743']) ? $this->answer_data['poll_08020551115586743'] : '',
            'answer_7' => isset($this->answer_data['poll_08832178457188751']) ? $this->answer_data['poll_08832178457188751'] : '',
        ];
    }
}
