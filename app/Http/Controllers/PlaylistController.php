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

    public function delete($playlist_id) {
        $playlist = Playlist::findOrFail($playlist_id);

        $playlist->delete();

        $playlist->Songs()->detach();

        return redirect('playlists')->with('status', 'Playlist ' . $playlist_id . ' verwijderd.');
    }

    public function list () {
        $lists = PlayList::all();
        return view('playlists.list', ['playlists'=>$lists]);
    }

    // toont een formulier waarin je de naam kunt invullen en toont de geselecteerde songs
    // http://laravel-install-demo.test/playlist/create
    public function create() {
        $sp = new SongsInSession();
        $songs_in_session = $sp->GetSongs();

        return view ('playlists.create')->with('songs_in_session', $songs_in_session);
    }

    // het formulier dat bij de /create/ is ingevuld, wordt na klik op "opslaan" hierheen gestuurd
    // middels een POST request.
    public function store(Request $request) {
        $newPlaylist = Playlist::create($request->all());

        $sp = new SongsInSession();

        // iterate all items currently in session
        foreach($sp->GetSongIDs() as $id) {
            $newPlaylist->Songs()->attach($id);     // vul de pivot table (kruistabel)
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
