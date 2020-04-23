<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class EpisodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'anime_id' => $this->anime_id,
            'number' => $this->number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'fansubs' => $this->whenLoaded('fansubs', function () {
                return DB::table('episode_fansub')
                    ->where('episode_id', '=', $this->id)
                    ->join('fansubs', 'fansubs.id', '=', 'fansub_id')
                    ->get();
            }),
            'users' => UserResource::collection($this->whenLoaded('users')),
            'anime' => new AnimeResource($this->whenLoaded('anime'))
        ];
    }
}
