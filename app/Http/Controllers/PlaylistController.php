<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\SongsInSession;
use Illuminate\Http\Request;
use App\Models\Song;

class PlaylistController extends Controller
{
    public function index() {
        $sp = new SongsInSession();
        echo '<pre>';
        var_dump($sp);
        echo '</pre>';
        //return view('dashboard');
    }

    public function list () {
        return view('playlists.list', ['playlists'=>Playlist::all()]);
    }

    // http://laravel-install-demo.test/playlist/create
    public function create() {
        $sp = new SongsInSession();
        $songs_in_session = $sp->GetSongs();

        return view ('playlists.create')->with('songs_in_session', $songs_in_session);
    }

    public function store(Request $request) {
        $newPlaylist = Playlist::create($request->all());

        $sp = new SongsInSession();

        // iterate all items currently in session
        foreach($sp->GetSongIDs() as $id) {
            $newPlaylist->Songs()->attach($id);
        }

        // clear items from session
        $sp->Clear();

        return redirect('playlists')->with('status', 'Nieuwe playlist aangemaakt.');
    }

    public function show($id) {
        $playlist = Playlist::find($id);
        $songs = $playlist->Songs;
        return view('playlists.show', ['playlist'=>$playlist , 'songs'=>$songs]);
    }


}
