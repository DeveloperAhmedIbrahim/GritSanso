<?php

namespace Database\Seeders;

use App\Models\Languages;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Languages::create([
            'language'=>"English",
            'locale'=>"en"
            
        ]);
        Languages::create([
            'language'=>"Spanish",
            'locale'=>"sp" 
        ]);
        Languages::create([
            'language'=>"Urdu",
            'locale'=>"ur"
        ]);
        
    }
}
