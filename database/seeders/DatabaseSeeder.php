<?php

namespace Database\Seeders;

use App\Models\ReplaceReason;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement("SET sql_mode='NO_AUTO_VALUE_ON_ZERO'");
        $this->call([
            ProvinceSeeder::class,
            RegencySeeder::class,
            DistrictSeeder::class,
            VillageSeeder::class,
            RoleSeeder::class,
            SurveySeeder::class,
            PeriodSeeder::class,
            StrataSeeder::class,
            SurveyFrameSeeder::class,
            SampleTypeSeeder::class,
            SamplingSeeder::class,
            ReplaceReasonSeeder::class,
            StatusSeeder::class            
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
