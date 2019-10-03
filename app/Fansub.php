<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fansub extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logo', 'mainlink'
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
        'logo' => 'string',
        'mainlink' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Fansubbers for the Fansub.
     */
    public function fansubbers()
    {
        return $this->hasMany(\App\Fansubber::class);
    }


    /**
     * Get the Anime for the Fansub.
     */
    public function anime()
    {
        return $this->belongsToMany(\App\Anime::class);
    }

    /**
     * Get the Episodes for the Fansub.
     */
    public function episodes()
    {
        return $this->belongsToMany(\App\Episode::class);
    }

}
