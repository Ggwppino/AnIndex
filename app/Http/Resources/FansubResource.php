<?php

namespace App\Http\Resources;

use App\Http\Controllers\FansubAPIController;
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
            'animes' => AnimeResource::collection($this->whenLoaded('animes')),
            'episodes' => $this->whenLoaded('episodes', function(){
                return FansubAPIController::getLastWorks($this->id);
            })
        ];
    }
}
