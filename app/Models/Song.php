<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'artist',
    ];

    public function Artists() {
        return $this->belongsToMany(Artist::class);
    }

    public function Playlists() {
        return $this->belongsToMany(Playlist::class);
    }
}
