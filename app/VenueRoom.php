<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueRoom extends Model
{
    protected $fillable = ['venue_id', 'room'];

    public function associatedVenue() {
        return $this->belongsTo('App\Venue', 'venue_id');
    }



}
