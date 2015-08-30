<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueRoomSlot extends Model
{
    protected $fillable = ['venue_room_id', 'date', 'start_time', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function associatedRoom() {
        return $this->belongsTo('App\VenueRoom', 'venue_room_id');
    }
}
