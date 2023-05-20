<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class RoleSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/roles.csv';
        $this->timestamps = false;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
