<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'anime_id', 'number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'number' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Anime for the Episode.
     */
    public function anime()
    {
        return $this->belongsTo(\App\Anime::class);
    }


    /**
     * Get the Fansubs for the Episode.
     */
    public function fansubs()
    {
        return $this->belongsToMany(\App\Fansub::class);
    }

    /**
     * Get the Users for the Episode.
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

}
