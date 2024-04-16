<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// http://laravel-install-demo.test/???????????

Route::get('/', function () {
    return view('welcome');
});

// http://laravel-install-demo.test/dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//

Route::get('/selected', [App\Http\Controllers\SessionController::class, 'showSession'])->name('sessionitems');
Route::get('/session', [App\Http\Controllers\SessionController::class, 'index']);
Route::get('/session/add/{song_id}', [App\Http\Controllers\SessionController::class, 'addSongIDtoSession']);

Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index']);

Route::get('/tags', [App\Http\Controllers\TagController::class, 'index']);

// http://laravel-install-demo.test/todo/create
Route::get('/todo/create', [App\Http\Controllers\TodoController::class, 'create']);

Route::get('/playlist', [App\Http\Controllers\PlaylistController::class, 'index'])->name('playlist.index');
Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'list'])->name('playlists');
Route::get('/playlist/create', [App\Http\Controllers\PlaylistController::class, 'create'])->name('playlist.create');
Route::get('/playlist/show/{id}', [App\Http\Controllers\PlaylistController::class, 'show'])->name('playlist.show');
Route::post('/playlist/store', [App\Http\Controllers\PlaylistController::class, 'store'])->name('playlist.store');
Route::get('/playlist/delete/{playlist_id}', [App\Http\Controllers\PlaylistController::class, 'delete'])->name('playlist.delete');

Route::get('/playlist/add/{song_id}', [App\Http\Controllers\PlaylistController::class, 'addSongIDtoSession'])->name('playlist.add');

// http://laravel-install-demo.test/songs
Route::get('/songs', [App\Http\Controllers\SongController::class, 'index'])->name('songs');

Route::get('/mail', [App\Http\Controllers\MailController::class, 'Send'])->name('mail.send')->middleware('auth');

require __DIR__.'/auth.php';
