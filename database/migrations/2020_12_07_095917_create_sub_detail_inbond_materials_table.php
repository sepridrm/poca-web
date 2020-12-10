<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDetailInbondMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_detail_inbond_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_detail_inbond_material")->nullable();
            $table->foreign("id_detail_inbond_material")->references("id")->on("detail_inbond_materials");
            $table->string('type',100)->nullable(false);
            $table->string('serial_number',100)->nullable(false);
            $table->text('path_foto')->nullable(false);
            $table->string('keterangan',100)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_detail_inbond_materials');
    }
}
