<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Admin();
        $data->nama = 'admin';
        $data->email = 'admin@gmail.com';
        $data->password = Hash::make('12345');
        $data->save();
    }
}
