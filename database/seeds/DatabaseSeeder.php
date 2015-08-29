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

        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Shashank Gaurav',
            'email' => 'shashank19gaurav@gmail.com',
            'user_type'    => 'club',
            'password' => Hash::make('manipal'),
        ));

        Model::reguard();
    }
}
