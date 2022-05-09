<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SongsInSession //extends Model
{
    use HasFactory;

    private $items = Array();     //  [1, 4, 6]

    function __construct()
    {
        if (! Session::exists('playlist')) {
            // if there is no current 'playlist' item in the session, create one
            Session::put('playlist', $this->items);
            $this->saveToSession();
        } else {
            // retrieve existing session
            $this->items = Session::get('playlist');
        }
    }

    function AddSongID($song_id) {
        // TODO: prevent duplicates
        //$this->items[] = $song_id;
        array_push($this->items, $song_id);
        $this->saveToSession();
    }

    function GetSongIDs() {
        return $this->items;
    }

    static function GetSongCount() {
        $s = Session::has('playlist');
        if ($s) {
            return count(session('playlist'));
        }
        return 0;
    }

    function GetSongs() {
        $song_ids = $this->GetSongIDs();
        $songs = [];

        foreach($song_ids as $id) {
            $song = Song::find($id);
            if ($song != null) {
                $songs[] = $song;
            }
        }

        return collect($songs);
    }

    function Clear() {
        $this->items = [];
        $this->saveToSession();
    }

    function saveToSession() {
        Session::put('playlist', $this->items);
        Session::save();        // when using dd, session is not saved, therefore this manual save
    }
}
