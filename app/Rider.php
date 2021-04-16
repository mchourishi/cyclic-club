<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    public const APP_CLUB = 'App\Club';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'grading','age', 'gender', 'club_id'
    ];

    /**
     * Get the club associated with the rider.
     */
    public function club()
    {
        return $this->hasOne(self::APP_CLUB, 'id', 'club_id');
    }

    /**
     * Get the list of races of a rider.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function races(){
        return $this->belongsToMany(Race::class, 'race_rider');
    }
}
