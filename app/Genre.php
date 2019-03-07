<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    public function animes(){
        $this->belongToMany(Anime::class);
    }
}
