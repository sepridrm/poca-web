<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Role;
use App\Models\Team;
use App\Models\TeamLeader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    private function insertRole($roleName){
        $data = new Role();
        $data->nama_role = $roleName;
        $data->save();
    }

    private function insertTeam($teamName){
        $data = new Team();
        $data->nama_team = $teamName;
        $data->save();
    }

    private function insertPegawai($idRole, $idTeam, $nama, $email, $nomorTelepon){
        $data = new Pegawai();
        $data->id_role = $idRole;
        $data->id_team = $idTeam;
        $data->nama = $nama;
        $data->email = $email;
        $data->nomor_telepon = $nomorTelepon;
        $data->password = Hash::make('12345');
        $data->path_foto = 'storage/pegawai/photo.png';
        $data->status = '1';
        $data->save();
    }

    private function insertLeader($idPegawai, $idTeam){
        $data = new TeamLeader();
        $data->id_pegawai = $idPegawai;
        $data->id_team = $idTeam;
        $data->save();
    }

    public function run()
    {
        $this->insertRole('PO MART');
        $this->insertRole('OFFICE');

        $this->insertTeam('PO MART I');
        $this->insertTeam('PO MART II');
        $this->insertTeam('PO MART III');
        $this->insertTeam('PO MART IV');
        $this->insertTeam('PO MART V');
        $this->insertTeam('PO MART VI');
        $this->insertTeam('OFFICE');

        $this->insertPegawai('1', '1', 'Syahrial Nasution', 's.nasution@gmail.com', '0812345678');
        $this->insertPegawai('1', '2', 'Ali Adnan', 'a.adnan@gmail.com', '0812345678');
        $this->insertPegawai('1', '3', 'Muhammad Ikhsan', 'm.ikhsan@gmail.com', '0812345678');
        $this->insertPegawai('1', '4', 'Bambang Sudewo', 'b.sudewo@gmail.com', '0812345678');
        $this->insertPegawai('1', '5', 'Seputra Adi', 's.adi@gmail.com', '0812345678');
        $this->insertPegawai('1', '6', 'Budi Hartas', 'b.hartas@gmail.com', '0812345678');
        $this->insertPegawai('1', '7', 'Akun Office', 'office@gmail.com', '0812345678');

        $this->insertLeader('1', '1');
        $this->insertLeader('2', '2');
        $this->insertLeader('3', '3');
        $this->insertLeader('4', '4');
        $this->insertLeader('5', '5');
        $this->insertLeader('6', '6');
    }
}
