<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FansubberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'fansub_id' => $this->fansub_id,
            'role' => $this->role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fansub' => new FansubResource($this->whenLoaded('fansub')),
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
