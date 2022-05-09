<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMessage;


class MailController extends Controller
{
    public function Send(Request $request) {
        $user = Auth::User();
        Mail::to($request->user())->send(new TestMessage($user));
    }
}
