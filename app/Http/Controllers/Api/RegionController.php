<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
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
        $data = DB::table("regions")
            ->selectRaw("regions.*, sub_regions.nama_sub_region, sub_regions.id as id_sub_region")
            ->join("sub_regions", "sub_regions.id_region", "=", "regions.id")
            ->get();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }
}
