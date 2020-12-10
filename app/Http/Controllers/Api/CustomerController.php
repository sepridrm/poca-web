<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
        $data = DB::table("customers")
            ->selectRaw("customers.*, operators.nama_operator, operators.id as id_operator")
            ->join("operators", "operators.id_customer", "=", "customers.id")
            ->get();

        return response([
            'status' => 'Ok',
            'message' => $scsMessage,
            'data' => $data
        ], 200);
    }
}
