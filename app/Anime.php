<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    //
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function seasons(){
        return $this->hasMany(Season::class);
    }

    public function createSeason(String $name) {
        $season = new Season();
        $season->name = $name;
        $this->seasons()->save($season);
    }
}
