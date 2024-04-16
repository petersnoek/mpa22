<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $sessionCount;

    public function __construct() {
        $this->sessionCount = \App\Models\SongsInSession::GetSongCount();
        //dd($this->sessionCount);
        View::share('sessionCount', $this->sessionCount);
    }
}
