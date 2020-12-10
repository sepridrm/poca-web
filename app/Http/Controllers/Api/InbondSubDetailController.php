<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DetailInbondMaterial;
use App\Models\SubDetailInbondMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InbondSubDetailController extends Controller
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
        $data = SubDetailInbondMaterial::orderBy('id', 'desc')->get();

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

        $data = SubDetailInbondMaterial::where('id_detail_inbond_material', $id)->orderBy('id', 'desc')->get();

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
        $errMessage = "Melebihi qty yang sudah ditentukan.";
        $qty = DetailInbondMaterial::where('id', $req->id_detail_inbond_material)->first();
        $countsubdetail = SubDetailInbondMaterial::where('id_detail_inbond_material', $req->id_detail_inbond_material)->count();
        if($countsubdetail == (int)$qty->qty){
            return response([
                'status' => 'Error',
                'message' => $errMessage,
            ], 200);
        }

        $path_file = '';
        if ($req->hasFile('path_foto')) {
            $dir = 'storage/inbond';
            $path = public_path($dir);
            if (!file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $file = $req->file('path_foto');
            $file_name = Str::random(20).".jpg";
            $file->move($path, $file_name);
            $path_file = $dir . "/" . $file_name;
        }

        $data = new SubDetailInbondMaterial();
        $data->id_detail_inbond_material = $req->id_detail_inbond_material;
        $data->type = $req->type;
        $data->serial_number = $req->serial_number;
        $data->path_foto = $path_file;
        $data->keterangan = $req->keterangan;
        $data->save();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }
}
