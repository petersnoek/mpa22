<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        // artists
        $artist_u2_id = DB::table('artists')->insertGetId(['name' => 'U2', 'created_at' => Carbon::now()]);
        $artist_mg_id = DB::table('artists')->insertGetId(['name' => 'Martin Garrix', 'created_at' => Carbon::now()]);
        $artist_within_id = DB::table('artists')->insertGetId(['name' => 'Within Temptation', 'created_at' => Carbon::now()]);

        // albums
        $album_joshua_id = DB::table('albums')->insertGetId(['title' => 'Joshua Tree', 'year' => 1987, 'created_at' => Carbon::now()]);
        $album_resist = DB::table('albums')->insertGetId(['title' => 'Resist', 'year' => 2019, 'created_at' => Carbon::now()]);

        // songs
        $song_pride_id = DB::table('songs')->insertGetId(['name' => 'Pride', 'album_id'=>$album_joshua_id, 'duration'=>192, 'created_at' => Carbon::now()]);
        $song_still_id = DB::table('songs')->insertGetId(['name' => "I Still haven't found", 'album_id'=>$album_joshua_id, 'duration'=>192, 'created_at' => Carbon::now()]);
        $song21 = DB::table('songs')->insertGetId(['name' => 'The Reckoning', 'album_id'=>$album_resist, 'duration'=>251, 'created_at' => Carbon::now()]);
        $song22 = DB::table('songs')->insertGetId(['name' => 'Endless War', 'album_id'=>$album_resist, 'duration'=>249, 'created_at' => Carbon::now()]);
        $song23 = DB::table('songs')->insertGetId(['name' => 'Raise Your Banner', 'album_id'=>$album_resist, 'duration'=>334, 'created_at' => Carbon::now()]);

        // songs <> albums
        DB::table('artist_song')->insert(['song_id' => $song_pride_id, 'artist_id'=>$artist_u2_id]);
        DB::table('artist_song')->insert(['song_id' => $song_pride_id, 'artist_id'=>$artist_mg_id]);
        DB::table('artist_song')->insert(['song_id' => $song21, 'artist_id'=>$artist_within_id]);
        DB::table('artist_song')->insert(['song_id' => $song22, 'artist_id'=>$artist_within_id]);
        DB::table('artist_song')->insert(['song_id' => $song23, 'artist_id'=>$artist_within_id]);

        // playlists
        $playlist_u2 = DB::table('playlists')->insertGetId(['name' => 'Famous U2 songs', 'created_at' => Carbon::now()]);
        $playlist_WI = DB::table('playlists')->insertGetId(['name' => 'My Within Temptation playlist', 'created_at' => Carbon::now()]);

        // songs <> playlists
        DB::table('playlist_song')->insert(['song_id' => $song_pride_id, 'playlist_id'=>$playlist_u2]);
        DB::table('playlist_song')->insert(['song_id' => $song_still_id, 'playlist_id'=>$playlist_u2]);
        DB::table('playlist_song')->insert(['song_id' => $song21, 'playlist_id'=>$playlist_WI]);
        DB::table('playlist_song')->insert(['song_id' => $song22, 'playlist_id'=>$playlist_WI]);
        DB::table('playlist_song')->insert(['song_id' => $song23, 'playlist_id'=>$playlist_WI]);

        // tags
        $this->call([
            GenreSeeder::class,
            TagSeeder::class,
        ]);
    }
}
