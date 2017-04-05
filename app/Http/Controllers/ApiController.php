<?php

namespace App\Http\Controllers {

    use Illuminate\Http\Request;
    use App\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Config;

    class ApiController extends Controller
    {


         public function getAvatar($mail){
             $infos_user = DB::select('select url_avatar from ava_mails where adress = ?',[$mail]);
             $json_user = json_encode($infos_user);
             return $json_user;
        }

        public function getInfos(){

            return Config::get('api.api');
        }


        }
    }

