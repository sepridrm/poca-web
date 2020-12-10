<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $apiKey = "lkjnsfaJHoahslkf889w4najnKLNLKGjnaljnsdio8";

    public function login(Request $req){
        $errApiKey = "You don't have Authorization.";
        if($this->apiKey != $req->header('apiKey')){
            return response([
                'status'=>'Error',
                'message'=>$errApiKey,
            ], 200);
        }
        $errMessage = "Email atau Password tidak valid.";
        $scsMessage = "Login berhasil.";
        $findUser = DB::table("pegawais")
                ->selectRaw("pegawais.*, roles.nama_role, teams.nama_team")
                ->join("roles","pegawais.id_role","=","roles.id")
                ->join("teams","pegawais.id_team","=","teams.id")
                ->where("email",$req->email)->first();

        if($findUser){
            $isValid = Hash::check($req->password, $findUser->password);
            if($isValid) {
                $team_leader = DB::table("pegawais")
                ->selectRaw("pegawais.*")
                ->join("team_leaders","pegawais.id","=","team_leaders.id_pegawai")
                ->where("pegawais.id_team",$findUser->id_team)->first();

                $findUser->team_leader = $team_leader;

                return response([
                    'status'=>'Ok',
                    'message'=>$scsMessage,
                    'data'=>$findUser
                ], 200);
            }else{
                return response([
                    'status'=>'Error',
                    'message'=>$errMessage,
                ], 200);
            }
        }else{
            return response([
                'status'=>'Error',
                'message'=>$errMessage,
            ], 200);
        }
    }
}
