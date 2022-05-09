<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insertGetId(['name' => 'Vrolijk', 'created_at' => Carbon::now()]);
        DB::table('tags')->insertGetId(['name' => 'Up-tempo', 'created_at' => Carbon::now()]);
        DB::table('tags')->insertGetId(['name' => 'Epic', 'created_at' => Carbon::now()]);
    }
}
