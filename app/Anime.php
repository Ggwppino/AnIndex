<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'sequel', 'father', 'plot', 'img'
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
        'name' => 'string',
        'img' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Episodes for the Anime.
     */
    public function episodes()
    {
        return $this->hasMany(\App\Episode::class);
    }


    /**
     * Get the Targets for the Anime.
     */
    public function targets()
    {
        return $this->belongsToMany(\App\Target::class);
    }

    /**
     * Get the Categories for the Anime.
     */
    public function categories()
    {
        return $this->belongsToMany(\App\Category::class);
    }

    /**
     * Get the Fansubs for the Anime.
     */
    public function fansubs()
    {
        return $this->belongsToMany(\App\Fansub::class);
    }

    /**
     * Get the Users for the Anime.
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

}
