<?php

namespace Database\Seeders;

use App\Models\Topics;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topics::create([
            'topic'=>"1-> Dicipline",
            'coach_service_id'=>1
        ]);
        Topics::create([
            'topic'=>"2-> Fitness",
            'coach_service_id'=>1
        ]);
        Topics::create([
            'topic'=>"1-> Dicipline",
            'coach_service_id'=>2
        ]);
        Topics::create([
            'topic'=>"2-> Fitness",
            'coach_service_id'=>2
        ]);
    }
}
