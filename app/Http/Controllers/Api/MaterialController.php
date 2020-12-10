<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
        $data = Material::all();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }
}
