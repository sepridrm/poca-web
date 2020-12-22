<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Material;
use App\Models\Operator;
use App\Models\Region;
use App\Models\SubRegion;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    private function insertRegion($namaRegion){
        $data = new Region();
        $data->nama_region = $namaRegion;
        $data->save();
    }

    private function insertSubRegion($idRegion, $namaSubRegion){
        $data = new SubRegion();
        $data->id_region = $idRegion;
        $data->nama_sub_region = $namaSubRegion;
        $data->save();
    }

    private function insertCustomer($namaCustomer){
        $data = new Customer();
        $data->nama_customer = $namaCustomer;
        $data->save();
    }

    private function insertOperator($idCustomer, $namaOperator){
        $data = new Operator();
        $data->id_customer = $idCustomer;
        $data->nama_operator = $namaOperator;
        $data->save();
    }

    private function insertMaterial($namaMaterial){
        $data = new Material();
        $data->nama_material = $namaMaterial;
        $data->save();
    }

    public function run()
    {
        // $this->insertRegion('SOUTH CENTRAL SUMATERA');
        // $this->insertRegion('NORT CENTRAL SUMATERA');

        // $this->insertSubRegion('1', 'LAMPUNG');
        // $this->insertSubRegion('1', 'PALEMBANG');
        // $this->insertSubRegion('1', 'BANGKA');
        // $this->insertSubRegion('1', 'BELITUNG');
        // $this->insertSubRegion('1', 'JAMBI');
        // $this->insertSubRegion('1', 'BENGKULU');

        // $this->insertSubRegion('2', 'ACEH');
        // $this->insertSubRegion('2', 'MEDAN');
        // $this->insertSubRegion('2', 'PEKANBARU');
        // $this->insertSubRegion('2', 'PADANG');
        // $this->insertSubRegion('2', 'BATAM');

        // $this->insertCustomer('HUAWEI');
        // $this->insertCustomer('NOKIA');
        // $this->insertCustomer('ERICSON');

        // $this->insertOperator('1','XL');
        // $this->insertOperator('1','H3I');
        // $this->insertOperator('1','TSEL');
        // $this->insertOperator('1','ISAT');

        // $this->insertOperator('2','XL');
        // $this->insertOperator('2','H3I');
        // $this->insertOperator('2','TSEL');
        // $this->insertOperator('2','ISAT');

        // $this->insertOperator('3','XL');
        // $this->insertOperator('3','H3I');
        // $this->insertOperator('3','TSEL');
        // $this->insertOperator('3','ISAT');

        $this->insertMaterial('WRFU');
        $this->insertMaterial('WRFU A');
        $this->insertMaterial('WRFU D');
        $this->insertMaterial('MRFU');
        $this->insertMaterial('GRFU');
        $this->insertMaterial('ANTENA');
        $this->insertMaterial('CONBAINER');
        $this->insertMaterial('RRU');
        $this->insertMaterial('DCDU');
    }
}
