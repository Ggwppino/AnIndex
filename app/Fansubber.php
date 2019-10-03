<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fansubber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'fansub_id', 'role'
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
        'role' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Fansub for the Fansubber.
     */
    public function fansub()
    {
        return $this->belongsTo(\App\Fansub::class);
    }


    /**
     * Get the User for the Fansubber.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

}
