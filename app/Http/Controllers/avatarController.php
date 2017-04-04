<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;

class avatarController extends Controller
{
    public function showAvatarsList($id){
        $mails = Mail::with('users')->where('user_id','=',$id)->get();
        return view('home', ['mails' => $mails]);
    }
}
