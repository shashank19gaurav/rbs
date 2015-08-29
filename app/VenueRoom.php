<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueRoom extends Model
{
    protected $fillable = ['venue_id', 'room', 'details'];
}
