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

            $mail = new Mail;
            $mail -> adress = $request -> mail;
            $mail -> user_id = Auth::id();
            $mail -> url_avatar = "";
            $mail->save();

            $avatarName = $mail->id.'.'.
                $request->avatar->getClientOriginalName();


            $request->file('avatar')->move(
                base_path().'/public/assets/avatars/', $avatarName
            );

            $urlAvatar = asset('assets/avatars/'.$avatarName);
            $mail-> url_avatar = $urlAvatar;
            $mail->save();
            return redirect()->route('listAvatars')->withErrors($validator);

        }

        elseif ($validator->fails()){
          return redirect()->route('listAvatars')->withErrors($validator);
        }

    }

    public function deleteAvatar($id)
    {
        $avatar = Mail::where('id','=',$id);
        $avatar -> delete();
        return redirect()->route('listAvatars');

    }

}
