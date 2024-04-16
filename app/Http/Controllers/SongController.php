<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\SongsInSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SongController extends Controller
{
    public function index() {
        $sis = new SongsInSession();
        $selected_count = $sis->getSongCount();
        View::share('selected_count', $selected_count);

        $songs = Song::all();
        // return view('songs.index', ['songs' => $songs, 'selected_count' => $selected_count]);
        return view('songs.index', ['songs' => $songs]);
    }
}
