<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueRoomSlot extends Model
{
    protected $fillable = ['venue_room_id', 'date', 'start_time', 'status'];
}
