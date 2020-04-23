<?php

namespace App\Http\Resources;

use App\Http\Controllers\AnimeAPIController;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimeResource extends JsonResource
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
            'status' => $this->status,
            'sequel' => $this->sequel,
            'father' => $this->father,
            'plot' => $this->plot,
            'img' => $this->img,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'relations' => $this->whenLoaded('episodes', function(){
                return AnimeAPIController::getRelations($this->id);
            }),
            'episodes' => EpisodeResource::collection($this->whenLoaded('episodes')),
            'targets' => TargetResource::collection($this->whenLoaded('targets')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'fansubs' => FansubResource::collection($this->whenLoaded('fansubs')),
            'users' => UserResource::collection($this->whenLoaded('users'))
        ];
    }
}
