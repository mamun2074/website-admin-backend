<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'title'=>'Web Admin Template::',
            'company_name'=>'Waiting to give name',
            'address'=>'Road No 14, Nikunja-2, Khilkhet-1229, Dhaka Bangladesh',
            'company_logo_main'=>'upload/avatar/1.jpg'
        ]);
    }
}
