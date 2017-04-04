<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
