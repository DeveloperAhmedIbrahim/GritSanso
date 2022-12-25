<?php

namespace Database\Seeders;

use App\Enums\UserTypes;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Katie Sowers",
            'email' => "katie@gmail.com",
            'password' => Hash::make('0987654321'),
            'country' => 1,
            'phone_number' => "923412595060",
            'profile_picture' => 'https://sportshub.cbsistatic.com/i/r/2021/01/08/2f294f94-616c-41f3-ae8e-0db7646a4b8e/thumbnail/1200x675/fef7de29d2d1368a3f758933f7047717/sowers.jpg',
            'linkedin_link' => "https://www.linkedin.com/in/katie-sowers-569b3517a/",
            'type' => 'coach',
            'gender' => "Female",
            'about' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'fluent_in' => '1',

        ]);

        User::create([
            'name' => "Wayne",
            'email' => "wayne@gmail.com",
            'password' => Hash::make('0987654321'),
            'country' => 3,
            'phone_number' => "923432595060",
            'profile_picture' => 'https://variety.com/wp-content/uploads/2013/09/damon-waynes-jr.jpg?w=1024',
            'linkedin_link' => "https://www.linkedin.com/in/wayne-569b3517a/",
            'type' => 'coach',
            'gender' => "Male",
            'about' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'fluent_in' => '1',
        ]);

        User::create([
            'name' => "RD jr",
            'email' => "rdjr@gmail.com",
            'password' => Hash::make('0987654321'),
            'country' => 1,
            'profile_picture' => 'https://pbs.twimg.com/profile_images/475629768117727232/2OpL4xGY_400x400.jpeg',
            'phone_number' => "923013243081",
            
            'linkedin_link' => "",
            'type' => 'coachee',
            'gender' => "Male",
            'about' => "You know who I am.",
            'fluent_in' => '1',

        ]);
    }
}
