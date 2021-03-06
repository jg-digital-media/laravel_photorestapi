<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return   [
            "title" => $this->title,
            "caption" => $this->caption,
            "copyright" => $this->copyright,
            "email" => $this->email,
            "owner_id" => $this->owner_id
        ];
    }
}
