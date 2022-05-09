<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_at',
    ];

    public function Songs() {
        return $this->belongsToMany(Song::class);
    }
}
