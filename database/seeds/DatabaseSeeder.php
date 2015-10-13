<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('venues')->delete();
        //First Seed the Venue Data
        $venueAB5 = new App\Venue();
        $venueAB5->venue = 'AB5';
        $venueAB5->save();

        $venueNLH = new App\Venue();
        $venueNLH->venue = 'NLH';
        $venueNLH->save();

        //Then seed the Rooms data and finally seed the slot data
        $this->call('VenueRoomDataSeeder');
        $this->call('VenueRoomSlotsDataSeeder');

        Model::reguard();
    }
}
