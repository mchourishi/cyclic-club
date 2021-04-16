<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'address'
    ];

    /**
     * Get the clubs
     */
    public function getClubs()
    {
        return Club::orderBy('title')->get();
    }
}
