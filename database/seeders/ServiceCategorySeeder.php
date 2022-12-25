<?php

namespace Database\Seeders;

use App\Models\ServiceCategories;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     ServiceCategories::create([
        'service'=>"Football",
     ]);
     ServiceCategories::create([
        'service'=>"Basket Ball",
     ]);

     ServiceCategories::create([
        'service'=>"Development",
     ]);
    }
}
