<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SignupController extends Controller
{
    public function signup(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['user_id'])){
            return redirect()->route('user.index');
        }elseif(isset($loginSession['admin_id'])){
            return redirect()->route('admin.index');
        }

        return view('signup');
    }

    public function doSignup(Request $req){
        $findUser = User::where("email_pendaftar",$req->email_pendaftar)->first();
        if(!$findUser){
            $post_user = new User();
            $post_user->nama_pendaftar = $req->nama_pendaftar;
            $post_user->email_pendaftar = $req->email_pendaftar;
            $post_user->nomor_telepon_pendaftar = $req->nomor_telepon_pendaftar;
            $post_user->jabatan_pendaftar = $req->jabatan_pendaftar;
            $post_user->nama_instansi_usaha = $req->nama_instansi_usaha;
            $post_user->kabupaten_kota = $req->kabupaten_kota;
            $post_user->nomor_telepon_instansi_usaha = $req->nomor_telepon_instansi_usaha;
            $post_user->kode_pos_instansi_usaha = $req->kode_pos_instansi_usaha;
            $post_user->jenis_instansi_usaha = $req->jenis_instansi_usaha;
            $post_user->kecamatan = $req->kecamatan;
            $post_user->nomor_fax_instansi_usaha = $req->nomor_fax_instansi_usaha;
            $post_user->kode_kbli = $req->kode_kbli;
            $post_user->password = Hash::make($req->password);
            $kode = Str::random(20);
            $post_user->kode_verifikasi = $kode;
            
            $post_user->save();

            Mail::to($req->email_pendaftar)->send(new SendMail($req->nama_pendaftar, $kode));

            $nama = $req->nama_pendaftar;
            $email = $req->email_pendaftar;
            $kode = $req->kode_verifikasi;
            return view('verify-email', compact("nama", "email", "kode"));

        }else{
            return redirect()
                ->route("login")
                ->with("message","Email telah terdaftar. Silahkan masuk aplikasi");
        }
    }

    public function reVerifyEmail(Request $req, $nama, $email){
        $findUser = User::where("email_pendaftar", $email)->first();
        $kode = $findUser->kode_verifikasi;
        Mail::to($email)->send(new SendMail($nama, $kode));
        return view('verify-email', compact("nama", "email", "kode"));
    }

    public function doVerifyEmail(Request $req, $kode){
        $findUser = User::where("kode_verifikasi", $kode)->first();
        if(!$findUser){
            return view('failed-verify-email');
        }
        $findUser->status = "1";
        $findUser->save();

        return redirect()
                ->route("login")
                ->with("message","Email berhasil terverifikasi. Silahkan masuk aplikasi");
    }
}
