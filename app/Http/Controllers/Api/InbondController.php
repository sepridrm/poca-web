<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\InbondMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InbondController extends Controller
{
    private $apiKey = "lkjnsfaJHoahslkf889w4najnKLNLKGjnaljnsdio8";

    public function index(Request $req)
    {
        $errApiKey = "You don't have Authorization.";
        if($this->apiKey != $req->header('apiKey')){
            return response([
                'status'=>'Error',
                'message'=>$errApiKey,
            ], 200);
        }

        $scsMessage = "Success";
        $data = DB::table("inbond_materials")
            ->selectRaw("inbond_materials.*, pegawais.nama, pegawais.path_foto, pegawais.id as id_pegawai, regions.nama_region, sub_regions.nama_sub_region, customers.nama_customer, operators.nama_operator")
            ->join("pegawais", "inbond_materials.id_pegawai", "=", "pegawais.id")
            ->join("sub_regions", "inbond_materials.id_sub_region", "=", "sub_regions.id")
            ->join("regions", "sub_regions.id_region", "=", "regions.id")
            ->join("operators", "inbond_materials.id_operator", "=", "operators.id")
            ->join("customers", "operators.id_customer", "=", "customers.id")
            ->orderBy('inbond_materials.id', 'desc')
            ->get();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }

    public function show(Request $req, $id){
        $errApiKey = "You don't have Authorization.";
        if($this->apiKey != $req->header('apiKey')){
            return response([
                'status'=>'Error',
                'message'=>$errApiKey,
            ], 200);
        }

        $scsMessage = "Success";

        $data = DB::table("inbond_materials")
            ->selectRaw("inbond_materials.*, pegawais.nama, pegawais.path_foto, pegawais.id as id_pegawai, regions.nama_region, sub_regions.nama_sub_region, customers.nama_customer, operators.nama_operator")
            ->join("pegawais", "inbond_materials.id_pegawai", "=", "pegawais.id")
            ->join("sub_regions", "inbond_materials.id_sub_region", "=", "sub_regions.id")
            ->join("regions", "sub_regions.id_region", "=", "regions.id")
            ->join("operators", "inbond_materials.id_operator", "=", "operators.id")
            ->join("customers", "operators.id_customer", "=", "customers.id")
            ->where('inbond_materials.id_pegawai', $id)
            ->orderBy('inbond_materials.id', 'desc')
            ->get();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }

    public function store(Request $req){
        $errApiKey = "You don't have Authorization.";
        if($this->apiKey != $req->header('apiKey')){
            return response([
                'status'=>'Error',
                'message'=>$errApiKey,
            ], 200);
        }

        $scsMessage = "Success";

        $data = new InbondMaterial();
        $data->id_pegawai = $req->id_pegawai;
        $data->du_id = $req->du_id;
        $data->du_name = $req->du_name;
        $data->id_sub_region = $req->id_sub_region;
        $data->id_operator = $req->id_operator;
        $data->save();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }
}
