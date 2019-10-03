<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FansubResource extends JsonResource
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
            'name' => $this->name,
            'logo' => $this->logo,
            'mainlink' => $this->mainlink,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fansubbers' => FansubberResource::collection($this->whenLoaded('fansubbers')),
            'anime' => AnimeResource::collection($this->whenLoaded('anime')),
            'episodes' => EpisodeResource::collection($this->whenLoaded('episodes'))
        ];
    }
}
