<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'grade_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * Get the Comment_Episodes for the User.
     */
    public function commentEpisodes()
    {
        return $this->hasMany('App\Comment_Episode');
    }

    /**
     * Get the Comment_Animes for the User.
     */
    public function commentAnimes()
    {
        return $this->hasMany('App\Comment_Anime');
    }

    /**
     * Get the Fansubs for the User.
     */
    public function fansubs()
    {
        return $this->belongsToMany('App\Fansub');
    }
}