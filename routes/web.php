<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
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
        Route::get("/",[UserController::class, 'index'])->name("user.index");
        Route::get("/profile",[UserController::class, 'profile'])->name("user.profile");
        Route::post("/do-update-profil",[UserController::class, 'doUpdateProfile'])->name("user.do-update-profile");
        Route::get("/ppa-izin",[UserController::class, 'ppaIzin'])->name("user.ppa-izin");
        Route::get("/ppa-laporan",[UserController::class, 'ppaLaporan'])->name("user.ppa-laporan");
        Route::get("/ppu-izin",[UserController::class, 'ppuIzin'])->name("user.ppu-izin");
        Route::get("/ppu-laporan",[UserController::class, 'ppuLaporan'])->name("user.ppu-laporan");
        Route::get("/plb3-izin",[UserController::class, 'plb3Izin'])->name("user.plb3-izin");
        Route::get("/plb3-laporan",[UserController::class, 'plb3Laporan'])->name("user.plb3-laporan");
        Route::post("/do-perizinan",[UserController::class, 'doPerizinan'])->name("user.do-perizinan");
        Route::post("/do-laporan",[UserController::class, 'doLaporan'])->name("user.do-laporan");
        Route::post("/do-tempo",[UserController::class, 'doTempo'])->name("user.do-tempo");
    });
});

Route::prefix("admin")->group(function () {
    Route::middleware("authenticated")->group(function(){
        Route::get("/",[AdminController::class, 'index'])->name("admin.index");
        Route::get("/profile",[AdminController::class, 'profile'])->name("admin.profile");
        Route::post("/do-update-profil",[AdminController::class, 'doUpdateProfile'])->name("admin.do-update-profile");
        Route::get("/ppa-izin",[AdminController::class, 'ppaIzin'])->name("admin.ppa-izin");
        Route::get("/ppa-laporan",[AdminController::class, 'ppaLaporan'])->name("admin.ppa-laporan");
        Route::get("/ppu-izin",[AdminController::class, 'ppuIzin'])->name("admin.ppu-izin");
        Route::get("/ppu-laporan",[AdminController::class, 'ppuLaporan'])->name("admin.ppu-laporan");
        Route::get("/plb3-izin",[AdminController::class, 'plb3Izin'])->name("admin.plb3-izin");
        Route::get("/plb3-laporan",[AdminController::class, 'plb3Laporan'])->name("admin.plb3-laporan");
        Route::get("/instansi-perusahaan",[AdminController::class, 'instansiPerusahaan'])->name("admin.instansi-perusahaan");
    });
});

Route::get('/template', function () {
    return redirect("/template/index.html");
});