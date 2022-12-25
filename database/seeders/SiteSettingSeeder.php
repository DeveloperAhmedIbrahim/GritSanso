<?php

namespace Database\Seeders;

use App\Enums\SiteSettings;
use App\Models\SiteSetttingModel;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        SiteSetttingModel::create([
            'key'=>SiteSettings::Logo,
            'value'=>public_path()."/favicon.ico",
        ]);
        SiteSetttingModel::create([
            'key'=>SiteSettings::Favicon,
            'value'=>"https://media-exp1.licdn.com/dms/image/C4E0BAQGswvmyYs1sbw/company-logo_200_200/0/1603606186994?e=2147483647&v=beta&t=l2UUp7jwQhd9ut9fWpOcXGWUfz46HE8t84UZ-Q3c98U",
        ]);
        SiteSetttingModel::create([
            'key'=>SiteSettings::DefaultCurrency,
            'value'=>"USD"
        ]);
    
         SiteSetttingModel::create([
            'key'=>SiteSettings::ServiceFee,
            'value'=>"5", //always in percentage
        ]);

        SiteSetttingModel::create([
            'key'=>SiteSettings::SiteTitle,
            'value'=>"Grit's Coachs"
        ]);
        SiteSetttingModel::create([
            'key'=>SiteSettings::CurrencySign,
            'value'=>"\$"
        ]);
       
    }
}
