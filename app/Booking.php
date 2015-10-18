<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use \Znck\Eloquent\Relations\BelongsToThroughTrait;
    protected $fillable = ['venue_room_slot_id', 'user_id', 'details'];

    public function associatedVenueRoomSlot() {
        return $this->belongsTo('App\VenueRoomSlot', 'venue_room_slot_id');
    }

    public function associatedVenueRoom() {
        return $this->belongsToThrough('App\VenueRoom', 'App\VenueRoomSlot');
    }
}
