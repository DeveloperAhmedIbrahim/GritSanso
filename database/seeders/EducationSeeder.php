<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'school_name'=>"Rockford ST",
            'field_of_study'=>'Physical Health',
            'degree'=>"BS Physical Health",
            'from'=>"2019-01-01",
            'to'=>"2022-01-01",
            'user_id'=>1
        ]);
        Education::create([
            'school_name'=>"Rockford ST",
            'field_of_study'=>'Physical Health',
            'degree'=>"BS Physical Health",
            'from'=>"2019-01-01",
            'to'=>"2022-01-01",
            'user_id'=>2
        ]);
    }
}
