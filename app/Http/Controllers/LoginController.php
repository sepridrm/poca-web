<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pegawai;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['user_id'])){
            return redirect()->route('user.index');
        }elseif(isset($loginSession['admin_id'])){
            return redirect()->route('admin.index');
        }

        $loginSession = $req->session()->get("login");
        if(isset($loginSession['user_id']) || isset($loginSession['admin_id'])){
            return view('contents.dashboard', compact("loginSession"));
        }

        return view("login");
    }

    public function logout(Request $req) {
        $req->session()->remove("login");
        return redirect()->route("login")->with("message","Berhasil logout aplikasi");
    }

    public function doLogin(Request $req) {
        $errMessage = "Login gagal. Email atau Password tidak valid. Silahkan coba lagi.";
        $findUser = Pegawai::where("email",$req->email)->first();

        if($findUser){
            // if($findUser->status == "0"){
            //     $nama = $findUser->nama_pendaftar;
            //     $email = $findUser->email_pendaftar;
            //     $kode = $findUser->kode_verifikasi;
            //     return view('verify-email', compact("nama", "email", "kode"));
            // }
            
            $isValid = Hash::check($req->password,  $findUser->password);
            if($isValid) {
                $currentRole = $findUser->getRole;
                $roleName = $currentRole->nama_role;
                $roleId = $currentRole->id;
                $req->session()->put("login",[
                    "pegawai_id"=>$findUser->id,
                    "name"=>$findUser->nama,
                    "email"=>$findUser->email,
                    "id_role"=>$roleId,
                    "nama_role"=>$roleName
                ]);
                return redirect()->route("pegawai.index");
            }
        }else{
            $findAdmin = Admin::where("email",$req->email)->first();

            if(!$findAdmin) {
                return redirect()->back()->with("message",$errMessage);
            }

            $isValid = Hash::check($req->password,  $findAdmin->password);

            if($isValid) {
                $req->session()->put("login",[
                    "admin_id"=>$findAdmin->id,
                    "name"=>$findAdmin->nama,
                    "email"=>$findAdmin->email
                ]);
                return redirect()->route("admin.index");
            }
        }

        return redirect()->back()->with("message",$errMessage);
    }
}
