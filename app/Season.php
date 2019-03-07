<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public $timestamps = false;
    public function anime(){
        return $this->belongsTo(Anime::class);
    }

    public function episode(){
        return $this->hasMany(Episode::class);
    }

    public function createEpisode(int $number){
        $episode= new Episode;
        $episode->time=0;
        $episode->number=$number;
        $this->episode()->save($episode);
    }
}
