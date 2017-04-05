<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use Illuminate\Support\Facades\Auth;

class avatarController extends Controller
{
    public function showAvatarsList(){
        $mails = Mail::with('users')->where('user_id','=', Auth::id())->get();
        return view('home')->with(array('mails'=>$mails));
    }
}
