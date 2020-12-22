<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\InbondMaterial;
use App\Models\DetailInbondMaterial;
use App\Models\SubDetailInbondMaterial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['pegawai_id'])){
            return redirect()->route('pegawai.index');
        }

        $countInbond = InbondMaterial::count();
        $countInbondDetail = DetailInbondMaterial::count();
        $countInbondDetailQty = DetailInbondMaterial::sum('qty');
        $countInbondSubDetail = SubDetailInbondMaterial::count();

        $inbond = DB::table("inbond_materials")
            ->selectRaw("inbond_materials.*, pegawais.nama, pegawais.path_foto, pegawais.id as id_pegawai, regions.nama_region, sub_regions.nama_sub_region, customers.nama_customer, operators.nama_operator")
            ->join("pegawais", "inbond_materials.id_pegawai", "=", "pegawais.id")
            ->join("sub_regions", "inbond_materials.id_sub_region", "=", "sub_regions.id")
            ->join("regions", "sub_regions.id_region", "=", "regions.id")
            ->join("operators", "inbond_materials.id_operator", "=", "operators.id")
            ->join("customers", "operators.id_customer", "=", "customers.id")
            ->orderBy('inbond_materials.id', 'desc')
            ->get();
    
        return view('contents.admin.admin-dashboard', compact("loginSession", "inbond", "countInbond", "countInbondDetail", "countInbondDetailQty", "countInbondSubDetail"));
    }

    public function inbond(Request $req){
        $loginSession = $req->session()->get("login");
        $data = DB::table("inbond_materials")
            ->selectRaw("inbond_materials.*, pegawais.nama, pegawais.path_foto, pegawais.id as id_pegawai, regions.nama_region, sub_regions.nama_sub_region, customers.nama_customer, operators.nama_operator")
            ->join("pegawais", "inbond_materials.id_pegawai", "=", "pegawais.id")
            ->join("sub_regions", "inbond_materials.id_sub_region", "=", "sub_regions.id")
            ->join("regions", "sub_regions.id_region", "=", "regions.id")
            ->join("operators", "inbond_materials.id_operator", "=", "operators.id")
            ->join("customers", "operators.id_customer", "=", "customers.id")
            ->orderBy('inbond_materials.id', 'desc')
            ->get();
        
        return view('contents.admin.admin-inbond', compact("loginSession", "data"));
    }

    public function inbondDetail(Request $req, $id){
        $loginSession = $req->session()->get("login");
        $data = DB::table("detail_inbond_materials")
            ->selectRaw("detail_inbond_materials.id AS id_detail_inbond, detail_inbond_materials.qty, materials.id as id_material, materials.nama_material, sub_detail_inbond_materials.*")
            ->join("materials", "detail_inbond_materials.id_material", "=", "materials.id")
            ->join("sub_detail_inbond_materials", "sub_detail_inbond_materials.id_detail_inbond_material", "=", "detail_inbond_materials.id")
            ->where('detail_inbond_materials.id_inbond_material', $id)
            ->orderBy('detail_inbond_materials.id', 'desc')
            ->get();

        return view('contents.admin.admin-inbond-detail', compact("loginSession", "data"));
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
