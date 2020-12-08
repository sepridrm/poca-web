<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\Laporan;
use App\Models\Tempo;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(Request $req){
        $loginSession = $req->session()->get("login");
        if(isset($loginSession['admin_id'])){
            return redirect()->route('admin.index');
        }
        $ippa = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PPA']])->count();
        $ippu = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PPU']])->count();
        $iplb3 = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PLB3']])->count();
        $lppa = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPA']])->count();
        $lppu = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPU']])->count();
        $lplb3 = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PLB3']])->count();

        $izin = Izin::where('id_user', $loginSession['user_id'])->orderBy('id', 'DESC')->limit(5)->get();
        $laporan = Laporan::where('id_user', $loginSession['user_id'])->orderBy('id', 'DESC')->limit(5)->get();

        return view('contents.user-dashboard', compact("loginSession", "ippa", "ippu", "iplb3", "lppa", "lppu", "lplb3", "izin", "laporan"));
    }

    public function profile(Request $req){
        $loginSession = $req->session()->get("login");
        $profile = User::where('id', $loginSession['user_id'])->first();
        return view('contents.user-profile', compact("loginSession", "profile"));
    }

    public function doUpdateProfile(Request $req){
        $profile = User::find($req->id);
        $profile->nama_pendaftar = $req->nama_pendaftar;
        $profile->email_pendaftar = $req->email_pendaftar;
        $profile->nomor_telepon_pendaftar = $req->nomor_telepon_pendaftar;
        $profile->jabatan_pendaftar = $req->jabatan_pendaftar;
        $profile->nama_instansi_usaha = $req->nama_instansi_usaha;
        $profile->kabupaten_kota = $req->kabupaten_kota;
        $profile->nomor_telepon_instansi_usaha = $req->nomor_telepon_instansi_usaha;
        $profile->kode_pos_instansi_usaha = $req->kode_pos_instansi_usaha;
        $profile->jenis_instansi_usaha = $req->jenis_instansi_usaha;
        $profile->kecamatan = $req->kecamatan;
        $profile->nomor_fax_instansi_usaha = $req->nomor_fax_instansi_usaha;
        $profile->kode_kbli = $req->kode_kbli;
        if($profile->password != $req->password) {
            $profile->password = Hash::make($req->password);
        }
        $profile->save();
        return redirect()
        ->route("user.profile")
        ->with("message","Profil berhasil diubah");
    }

    public function ppaIzin(Request $req){
        $loginSession = $req->session()->get("login");
        $carbonNow = Carbon::now();

        $lastData = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PPA']])->orderBy('id', 'desc')->first();
        $dateNow = $carbonNow->format('Y-m-d');
        $tglBerlaku = $dateNow;
        if($lastData){
            $tglBerlaku = $lastData->tanggal_berlaku;
        }
        $tglBerlaku = new DateTime($tglBerlaku);
        $dateNow = new DateTime($dateNow);
        $dateDiff = $tglBerlaku->diff($dateNow)->format("%m bulan, %d hari");
        $izinBerlaku=false;
        if ($tglBerlaku > $dateNow)
            $izinBerlaku = true;

        $endDate = $carbonNow->addYear(10)->endOfYear()->format("Y-m-d");
        $data = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PPA']])->orderBy('id', 'desc')->get();
        $title = "PPA";
        return view('contents.user-izin', compact("loginSession", "endDate", "data", "title", "izinBerlaku", "dateDiff"));
    }

    public function ppaLaporan(Request $req){
        $loginSession = $req->session()->get("login");
        $carbonNow = Carbon::now();
        $tempo = Tempo::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPA'], ['tahun', $carbonNow->year]])->first();
        $visible = true;
        $jumlahLaporan = 0;
        $countLapor = 0;
        if($tempo){
            $visible = false;
            $jumlahLaporan = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPA']])->whereYear('created_at', '=', date('Y'))->count();
            $countLapor = (int)$tempo->jumlah_lapor - $jumlahLaporan;
        }

        $data = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPA']])->orderBy('id', 'desc')->get();
        $title = "PPA";
        
        return view('contents.user-laporan', compact("loginSession", "data", "title", "tempo", "visible", "countLapor", "jumlahLaporan"));
    }

    public function ppuIzin(Request $req){
        $loginSession = $req->session()->get("login");
        $carbonNow = Carbon::now();

        $lastData = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PPU']])->orderBy('id', 'desc')->first();
        $dateNow = $carbonNow->format('Y-m-d');
        $tglBerlaku = $dateNow;
        if($lastData){
            $tglBerlaku = $lastData->tanggal_berlaku;
        }
        $tglBerlaku = new DateTime($tglBerlaku);
        $dateNow = new DateTime($dateNow);
        $dateDiff = $tglBerlaku->diff($dateNow)->format("%m bulan, %d hari");
        $izinBerlaku=false;
        if ($tglBerlaku > $dateNow)
            $izinBerlaku = true;

        $endDate = $carbonNow->addYear(10)->endOfYear()->format("Y-m-d");
        $data = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PPU']])->orderBy('id', 'desc')->get();
        $title = "PPU";
        return view('contents.user-izin', compact("loginSession", "endDate", "data", "title", "izinBerlaku", "dateDiff"));
    }

    public function ppuLaporan(Request $req){
        $loginSession = $req->session()->get("login");
        $carbonNow = Carbon::now();
        $tempo = Tempo::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPU'], ['tahun', $carbonNow->year]])->first();
        $visible = true;
        $jumlahLaporan = 0;
        $countLapor = 0;
        if($tempo){
            $visible = false;
            $jumlahLaporan = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPU']])->whereYear('created_at', '=', date('Y'))->count();
            $countLapor = (int)$tempo->jumlah_lapor - $jumlahLaporan;
        }

        $data = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PPU']])->orderBy('id', 'desc')->get();
        $title = "PPU";

        return view('contents.user-laporan', compact("loginSession", "data", "title", "tempo", "visible", "countLapor", "jumlahLaporan"));
    }

    public function plb3Izin(Request $req){
        $loginSession = $req->session()->get("login");
        $carbonNow = Carbon::now();

        $lastData = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PLB3']])->orderBy('id', 'desc')->first();
        $dateNow = $carbonNow->format('Y-m-d');
        $tglBerlaku = $dateNow;
        if($lastData){
            $tglBerlaku = $lastData->tanggal_berlaku;
        }
        $tglBerlaku = new DateTime($tglBerlaku);
        $dateNow = new DateTime($dateNow);
        $dateDiff = $tglBerlaku->diff($dateNow)->format("%m bulan, %d hari");
        $izinBerlaku=false;
        if ($tglBerlaku > $dateNow)
            $izinBerlaku = true;

        $endDate = $carbonNow->addYear(10)->endOfYear()->format("Y-m-d");
        $data = Izin::where([['id_user', $loginSession['user_id']], ['jenis_izin', 'PLB3']])->orderBy('id', 'desc')->get();
        $title = "PLB3";
        return view('contents.user-izin', compact("loginSession", "endDate", "data", "title", "izinBerlaku", "dateDiff"));
    }

    public function plb3Laporan(Request $req){
        $loginSession = $req->session()->get("login");
        $carbonNow = Carbon::now();
        $tempo = Tempo::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PLB3'], ['tahun', $carbonNow->year]])->first();
        $visible = true;
        $jumlahLaporan = 0;
        $countLapor = 0;
        if($tempo){
            $visible = false;
            $jumlahLaporan = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PLB3']])->whereYear('created_at', '=', date('Y'))->count();
            $countLapor = (int)$tempo->jumlah_lapor - $jumlahLaporan;
        }

        $data = Laporan::where([['id_user', $loginSession['user_id']], ['jenis_laporan', 'PLB3']])->orderBy('id', 'desc')->get();
        $title = "PLB3";

        return view('contents.user-laporan', compact("loginSession", "data", "title", "tempo", "visible", "countLapor", "jumlahLaporan"));
    }

    public function doPerizinan(Request $req){
        if($req->sampai == null || $req->status == null){
            if($req->jenis_izin == "PPA"){
                return redirect()
                ->route("user.ppa-izin")
                ->with("message","Mohon lengkapi data");
            }else if($req->jenis_izin == "PPU"){
                return redirect()
                ->route("user.ppu-izin")
                ->with("message","Mohon lengkapi data");
            }else{
                return redirect()
                ->route("user.plb3-izin")
                ->with("message","Mohon lengkapi data");
            }
        }

        $path_file = [];
        if ($req->hasFile('path_file')) {
            foreach($req->file('path_file') as $file){
                $dir = 'storage/izin';
                $path = public_path($dir);
                if(!file_exists($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
		        $file->move($path, $file->getClientOriginalName());
                // $path = $file->store("public/perizinan/");
                $path_file[] = $dir."/".$file->getClientOriginalName();
            }
        }else{
            if($req->jenis_izin == "PPA"){
                return redirect()
                ->route("user.ppa-izin")
                ->with("message","Mohon lengkapi data");
            }else if($req->jenis_izin == "PPU"){
                return redirect()
                ->route("user.ppu-izin")
                ->with("message","Mohon lengkapi data");
            }else{
                return redirect()
                ->route("user.plb3-izin")
                ->with("message","Mohon lengkapi data");
            }
        }

        $perizinan = new Izin();
        $perizinan->id_user = $req->id;
        $perizinan->tanggal_berlaku = $req->sampai;
        $perizinan->status = $req->status;
        $perizinan->jenis_izin = $req->jenis_izin;
        $perizinan->path_file = \json_encode($path_file);
        $perizinan->save();

        if($req->jenis_izin == "PPA"){
            return redirect()
            ->route("user.ppa-izin")
            ->with("message","Perizinan berhasil ditambah");
        }else if($req->jenis_izin == "PPU"){
            return redirect()
            ->route("user.ppu-izin")
            ->with("message","Perizinan berhasil ditambah");
        }else{
            return redirect()
            ->route("user.plb3-izin")
            ->with("message","Perizinan berhasil ditambah");
        }
    }

    public function doLaporan(Request $req){
        $path_file = [];
        if ($req->hasFile('path_file')) {
            foreach($req->file('path_file') as $file){
                $dir = 'storage/laporan';
                $path = public_path($dir);
                if(!file_exists($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
		        $file->move($path, $file->getClientOriginalName());
                // $path = $file->store("public/perizinan/");
                $path_file[] = $dir."/".$file->getClientOriginalName();
            }
        }else{
            if($req->jenis_laporan == "PPA"){
                return redirect()
                ->route("user.ppa-laporan")
                ->with("message","Mohon lengkapi data");
            }else if($req->jenis_laporan == "PPU"){
                return redirect()
                ->route("user.ppu-laporan")
                ->with("message","Mohon lengkapi data");
            }else{
                return redirect()
                ->route("user.plb3-laporan")
                ->with("message","Mohon lengkapi data");
            }
        }

        $laporan = new Laporan();
        $laporan->id_user = $req->id;
        $laporan->jenis_laporan = $req->jenis_laporan;
        $laporan->path_file = \json_encode($path_file);
        $laporan->save();

        if($req->jenis_laporan == "PPA"){
            return redirect()
            ->route("user.ppa-laporan")
            ->with("message","Laporan berhasil ditambah");
        }else if($req->jenis_laporan == "PPU"){
            return redirect()
            ->route("user.ppu-laporan")
            ->with("message","Laporan berhasil ditambah");
        }else{
            return redirect()
            ->route("user.plb3-laporan")
            ->with("message","Laporan berhasil ditambah");
        }
    }

    public function doTempo(Request $req){
        if($req->tempo == null){
            if($req->jenis_izin == "PPA"){
                return redirect()
                ->route("user.ppa-laporan")
                ->with("message","Mohon lengkapi data");
            }else if($req->jenis_izin == "PPU"){
                return redirect()
                ->route("user.ppu-laporan")
                ->with("message","Mohon lengkapi data");
            }else{
                return redirect()
                ->route("user.plb3-laporan")
                ->with("message","Mohon lengkapi data");
            }
        }

        $tempo = new Tempo();
        $tempo->id_user = $req->id;
        $tempo->tempo = $req->tempo;
        if($req->tempo == "1"){
            $tempo->jumlah_lapor = "12";
        }else if($req->tempo == "3"){
            $tempo->jumlah_lapor = "4";
        }else if($req->tempo == "6"){
            $tempo->jumlah_lapor = "2";
        }else if($req->tempo == "12"){
            $tempo->jumlah_lapor = "1";
        }
        $tempo->jenis_laporan = $req->jenis_laporan;
        $carbonNow = Carbon::now();
        $tempo->tahun = $carbonNow->year;
        $tempo->save();

        if($req->jenis_laporan == "PPA"){
            return redirect()
            ->route("user.ppa-laporan")
            ->with("message","Waktu aporan berhasil disimpan");
        }else if($req->jenis_laporan == "PPU"){
            return redirect()
            ->route("user.ppu-laporan")
            ->with("message","Waktu aporan berhasil disimpan");
        }else{
            return redirect()
            ->route("user.plb3-laporan")
            ->with("message","Waktu aporan berhasil disimpan");
        }
    }
}
