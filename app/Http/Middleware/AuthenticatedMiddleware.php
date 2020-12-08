<?php

namespace App\Http\Middleware;


use Closure;

class AuthenticatedMiddleware {
    public function handle($req , Closure $next) {
        $loginSession = $req->session()->get("login");

        if(!$loginSession) {
            return redirect()->route("login")->with("pesan","Silahkan login aplikasi");
        }
        
        return $next($req);
    }
}