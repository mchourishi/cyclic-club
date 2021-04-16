<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public const APP_CLUB = 'App\Club';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'address', 'status','date_time', 'club_id'
    ];

    /**
     * Get the club associated with the race.
     */
    public function club()
    {
        return $this->hasOne(self::APP_CLUB, 'id', 'club_id');
    }

    /**
     * Get the list of riders of a race.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function riders(){
        return $this->belongsToMany(Rider::class, 'race_rider')->withPivot('order');
    }
}
