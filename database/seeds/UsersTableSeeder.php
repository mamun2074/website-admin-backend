<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user=\App\User::create([
            'name'=>'mahmud',
            'email'=>'mamun120520@gmail.com',
            'user_role'=>1,
            'password'=>bcrypt('1')
        ]);


        \App\Profile::create([
            "user_ID"=> $user->id,
            "first_name"=>"Md",
            "last_name"=>"Al-Mahmud",
            "gender"=>1,
            "designation"=>"PHP Developer",
            "phone_number"=>"+8801521497833",
            "NID"=>"1994",
            "permanent_address"=>"Vil:Rameshor Ganti, Post: Boyalier Char, PS: Raygonj, District: Sirajgonj",
            "present_address"=>"Nikunja-2,Khilkhet-1229,Dhaka,Bangladesh",
            'avatar'=>'upload/avatar/1.jpg',
            "education"=>'B.S. in Computer Science from the University of Primeasia University',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.'
        ]);


    }
}
