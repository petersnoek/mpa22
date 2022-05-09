<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre1 = DB::table('genres')->insertGetId(['name' => 'Pop', 'created_at' => Carbon::now()]);
        $genre2 = DB::table('genres')->insertGetId(['name' => 'Rock', 'created_at' => Carbon::now()]);
        $genre3 = DB::table('genres')->insertGetId(['name' => 'Metal', 'created_at' => Carbon::now()]);
        $genre4 = DB::table('genres')->insertGetId(['name' => 'Classical', 'created_at' => Carbon::now()]);
        $genre5 = DB::table('genres')->insertGetId(['name' => 'Chill', 'created_at' => Carbon::now()]);

    }
}
