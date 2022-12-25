<?php

namespace Database\Seeders;

use App\Models\ServiceModel;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceModel::create([
            'service_charges'=>425,'service_title'=>"Football tips",
            'service_category_id'=>1,'user_id'=>1,'service_status'=>1,
            'service_sessions'=>5
        ]);
        ServiceModel::create([
            'service_charges'=>925,'service_title'=>"Basketball tips",
            'service_category_id'=>2,'user_id'=>2,'service_status'=>1,
            'service_sessions'=>5
        ]);
    }
}
