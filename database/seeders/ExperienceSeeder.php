<?php

namespace Database\Seeders;

use App\Models\Experiences;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experiences::create([
            'exp_title'=>"Coach",
            'company_name'=>'FC Madrid',
            'exp_from'=>'2020-01-01',
            'user_id'=>1
        ]);
        Experiences::create([
            'exp_title'=>"Trainer",
            'company_name'=>'FC Belguim',
            'exp_from'=>'2019-01-01',
            'user_id'=>2
        ]);
    }
}
