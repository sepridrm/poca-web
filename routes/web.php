<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get("/signup",[SignupController::class, 'signup'])->name("signup");
Route::post("/do-signup",[SignupController::class, 'doSignup'])->name("do-signup");

Route::get("/login",[LoginController::class, 'login'])->name("login");
Route::post("/do-login",[LoginController::class, 'doLogin'])->name("do-login");
Route::get("/logout",[LoginController::class, 'logout'])->name("logout");

Route::get('/reverify-email/{nama}/{email}',[SignupController::class, 'reverifyEmail'])->name("reverify-email");
Route::get('/do-verify-email/{kode}',[SignupController::class, 'doVerifyEmail'])->name("do-verify-email");

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});

Route::prefix("/")->group(function () {
    Route::middleware("authenticated")->group(function(){
        Route::get("/",[PegawaiController::class, 'index'])->name("pegawai.index");
    });
});

Route::prefix("admin")->group(function () {
    Route::middleware("authenticated")->group(function(){
        Route::get("/",[AdminController::class, 'index'])->name("admin.index");
        Route::get("/inbond",[AdminController::class, 'inbond'])->name("admin.inbond");
    });
});

Route::get('/template', function () {
    return redirect("/template/index.html");
});