<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Izin;
use App\Models\Laporan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['user_id'])){
            return redirect()->route('user.index');
        }
    
        $ippa = Izin::where('jenis_izin', 'PPA')->count();
        $ippu = Izin::where('jenis_izin', 'PPU')->count();
        $iplb3 = Izin::where('jenis_izin', 'PLB3')->count();
        $lppa = Laporan::where('jenis_laporan', 'PPA')->count();
        $lppu = Laporan::where('jenis_laporan', 'PPU')->count();
        $lplb3 = Laporan::where('jenis_laporan', 'PLB3')->count();

        $izin = DB::table("izins")
                ->selectRaw("izins.*, users.nama_instansi_usaha")
                ->join("users","izins.id_user","=","users.id")
                ->limit(5)
            ->get();
        $laporan = DB::table("laporans")
            ->selectRaw("laporans.*, users.nama_instansi_usaha")
            ->join("users","laporans.id_user","=","users.id")
            ->limit(5)
        ->get();
        
        return view('contents.admin-dashboard', compact("loginSession", "ippa", "ippu", "iplb3", "lppa", "lppu", "lplb3", "izin", "laporan"));
    }

    public function profile(Request $req){
        $loginSession = $req->session()->get("login");
        $profile = DB::table("admins")
                ->selectRaw("admins.*, roles.nama_role")
                ->join("roles","admins.id_role","=","roles.id")
                ->where("admins.id", $loginSession['admin_id'])
            ->first();
        return view('contents.admin-profile', compact("loginSession", "profile"));
    }

    public function doUpdateProfile(Request $req){
        $profile = Admin::find($req->id);
        $profile->nama = $req->nama;
        $profile->email = $req->email;
        if($profile->password != $req->password) {
            $profile->password = Hash::make($req->password);
        }
        $profile->save();
        return redirect()
        ->route("admin.profile")
        ->with("message","Profil berhasil diubah");
    }

    public function ppaIzin(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("izins")
                ->selectRaw("izins.*, users.nama_instansi_usaha")
                ->join("users","izins.id_user","=","users.id")
                ->where('jenis_izin', 'PPA')
                ->orderBy('id', 'desc')
            ->get();
        $title = "PPA";
        return view('contents.admin-izin', compact("loginSession", "data", "title"));
    }

    public function ppaLaporan(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("laporans")
                ->selectRaw("laporans.*, users.nama_instansi_usaha")
                ->join("users","laporans.id_user","=","users.id")
                ->where('jenis_laporan', 'PPA')
                ->orderBy('id', 'desc')
            ->get();
        $title = "PPA";
        return view('contents.admin-laporan', compact("loginSession", "data", "title"));
    }

    public function ppuIzin(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("izins")
                ->selectRaw("izins.*, users.nama_instansi_usaha")
                ->join("users","izins.id_user","=","users.id")
                ->where('jenis_izin', 'PPU')
                ->orderBy('id', 'desc')
            ->get();
        $title = "PPU";
        return view('contents.admin-izin', compact("loginSession", "data", "title"));
    }

    public function ppuLaporan(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("laporans")
                ->selectRaw("laporans.*, users.nama_instansi_usaha")
                ->join("users","laporans.id_user","=","users.id")
                ->where('jenis_laporan', 'PPU')
                ->orderBy('id', 'desc')
            ->get();
        $title = "PPU";
        return view('contents.admin-laporan', compact("loginSession", "data", "title"));
    }

    public function plb3Izin(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("izins")
                ->selectRaw("izins.*, users.nama_instansi_usaha")
                ->join("users","izins.id_user","=","users.id")
                ->where('jenis_izin', 'PLB3')
                ->orderBy('id', 'desc')
            ->get();
        $title = "PLB3";
        return view('contents.admin-izin', compact("loginSession", "data", "title"));
    }

    public function plb3Laporan(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("laporans")
                ->selectRaw("laporans.*, users.nama_instansi_usaha")
                ->join("users","laporans.id_user","=","users.id")
                ->where('jenis_laporan', 'PLB3')
                ->orderBy('id', 'desc')
            ->get();
        $title = "PLB3";
        return view('contents.admin-laporan', compact("loginSession", "data", "title"));
    }

    public function instansiPerusahaan(Request $req){
        $loginSession = $req->session()->get("login");
        $instansiPerusahaan = User::orderBy('id', 'desc')->get();
        return view('contents.admin-instansi-perusahaan', compact("loginSession", "instansiPerusahaan"));
    }
}