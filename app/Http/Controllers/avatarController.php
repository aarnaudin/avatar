<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    public function showAvatarsList(){
        $mails = Mail::with('users')->where('user_id','=', Auth::id())->get();
        return view('home')->with(array('mails'=>$mails));
    }

    public function displayFormAvatar(Request $request)
    {
        return view('addAvatar');
    }

    public function addAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required',
            'mail' => 'required|email',
        ]);

        if ($validator->passes()){
            $input = $request->all();
        }

        elseif ($validator->fails()){
            echo 'Il y a une erreur : ';
            return $validator->errors()->all();
        }
    }
}
