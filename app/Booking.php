<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['venue_room_slot_id', 'user_id', 'details'];
}
