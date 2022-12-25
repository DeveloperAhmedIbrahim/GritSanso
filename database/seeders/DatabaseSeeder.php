<?php

namespace Database\Seeders;

use App\Models\Topics;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ServiceCategorySeeder::class,
            CountrySeeder::class,
            LanguageSeeder::class,
            WebSettingSeeder::class,
            SiteSettingSeeder::class,
            PaymentGatewaySeeder::class,
            UserSeeder::class,
            ServiceSeeder::class,
            EducationSeeder::class,
            ExperienceSeeder::class,
            TopicSeeder::class,
            RatingSeeder::class,
            EmailConfiguration::class,
        ]);
    }
}
