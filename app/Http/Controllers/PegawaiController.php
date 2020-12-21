<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['admin_id'])){
            return redirect()->route('admin.index');
        }
        
        return view('contents.pegawai-dashboard', compact("loginSession"));
    }
}
