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
        $rules = array(
            'avatar' => 'required|mimes:jpeg,png',
            'mail' => 'required|email',
        );

        $frMessages = [
            'mail.required' => 'L\'adresse mail n\'est pas renseignée !',
            'mail.email' => 'L\'adresse mail n\'est pas de type mail (Exemple : exemple@exemple.fr) !',
            'avatar.required' => 'Aucun avatar n\'a été téléchargé !',
            'avatar.mimes' => 'Le format du fichier doit être .jpeg, .jpg ou .png !',
        ];

        $validator = Validator::make($request->all(), $rules, $frMessages);

        if ($validator->passes()){
            $input = $request->all();
        }

        elseif ($validator->fails()){
          return redirect('/')->withErrors($validator);
        }
    }



}
