<?php

namespace Database\Seeders;

use App\Models\ReviewModel;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewModel::create([
            'review'=>'Awesome and professional service',
            'ratings'=>5.0,
            'coachee_id'=>3,
            'coach_id'=>1
        ]);
        ReviewModel::create([
            'review'=>'Awesome and professional service',
            'ratings'=>4.3,
            'coachee_id'=>3,
            'coach_id'=>2
        ]);
    }
}
