<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\SongsInSession;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index() {
        $sp = new SongsInSession();
        echo '<pre>';
        var_dump($sp);
        echo '</pre>';
        //return view('dashboard');
    }

    // /session/add/{song_id}
    public function addSongIDtoSession($song_id) {
        $sp = new SongsInSession();    // voert de controller uit van SongsInSession
        $sp->AddSongID($song_id);

        return redirect()->back();      // herlaad de vorige pagina
    }

    public function showSession() {
        $sp = new SongsInSession();
        $songs = $sp->GetSongs();   // gets us a collection of Song models

        return view('songs.selected', ['songs' => $songs]);
    }
}
