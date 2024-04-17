<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MailingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $item = parent::toArray($request);

        $item['stat'] = $this->count_send . ' из ' . $this->count_all;
        $item['email_list'] = $this->email_list ? implode(', ', $this->email_list) : $this->email_list;

        return $item;
    }
}
