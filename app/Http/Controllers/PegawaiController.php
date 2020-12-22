<?php

namespace App\Http\Controllers;

use App\Models\DetailInbondMaterial;
use App\Models\InbondMaterial;
use App\Models\SubDetailInbondMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['admin_id'])){
            return redirect()->route('admin.index');
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
    
        return view('contents.pegawai.pegawai-dashboard', compact("loginSession", "inbond", "countInbond", "countInbondDetail", "countInbondDetailQty", "countInbondSubDetail"));
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
        
        return view('contents.pegawai.pegawai-inbond', compact("loginSession", "data"));
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

        return view('contents.pegawai.pegawai-inbond-detail', compact("loginSession", "data"));
    }
}
