<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\SongsInSession;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index() {
        $sis = new SongsInSession();
        $selected_count = $sis->getSongCount();

        $songs = Song::all();
        return view('songs.index', ['songs' => $songs, 'selected_count' => $selected_count]);
    }
}
