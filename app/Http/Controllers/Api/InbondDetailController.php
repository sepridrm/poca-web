<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DetailInbondMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InbondDetailController extends Controller
{
    private $apiKey = "lkjnsfaJHoahslkf889w4najnKLNLKGjnaljnsdio8";

    public function index(Request $req)
    {
        $errApiKey = "You don't have Authorization.";
        if ($this->apiKey != $req->header('apiKey')) {
            return response([
                'status' => 'Error',
                'message' => $errApiKey,
            ], 200);
        }

        $scsMessage = "Success";
        $data = DB::table("detail_inbond_materials")
            ->selectRaw("detail_inbond_materials.*, materials.nama_material")
            ->join("materials", "detail_inbond_materials.id_material", "=", "materials.id")
            ->orderBy('detail_inbond_materials.id', 'desc')
            ->get();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }

    public function show(Request $req, $id)
    {
        $errApiKey = "You don't have Authorization.";
        if ($this->apiKey != $req->header('apiKey')) {
            return response([
                'status' => 'Error',
                'message' => $errApiKey,
            ], 200);
        }

        $scsMessage = "Success";

        $data = DB::table("detail_inbond_materials")
            ->selectRaw("detail_inbond_materials.*, materials.nama_material")
            ->join("materials", "detail_inbond_materials.id_material", "=", "materials.id")
            ->where('detail_inbond_materials.id_inbond_material', $id)
            ->orderBy('detail_inbond_materials.id', 'desc')
            ->get();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }

    public function store(Request $req)
    {
        $errApiKey = "You don't have Authorization.";
        if ($this->apiKey != $req->header('apiKey')) {
            return response([
                'status' => 'Error',
                'message' => $errApiKey,
            ], 200);
        }

        $scsMessage = "Success";
        $errMessage = "Material sudah ada.";
        $data = DetailInbondMaterial::where([['id_material', $req->id_material], ['id_inbond_material', $req->id_inbond_material]])->first();
        if (!$data) {
            $data = new DetailInbondMaterial();
            $data->id_inbond_material = $req->id_inbond_material;
            $data->id_material = $req->id_material;
            $data->qty = $req->qty;
            $data->save();

            return response([
                'status' => 'Ok',
                'message' => $scsMessage,
                'data' => $data
            ], 200);
        }else{
            return response([
                'status' => 'Error',
                'message' => $errMessage,
                'data' => $data
            ], 200);
        }
    }
}
