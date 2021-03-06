<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public function getRole(){
        return $this->belongsTo("App\Models\Role","id_role");
    }
}
