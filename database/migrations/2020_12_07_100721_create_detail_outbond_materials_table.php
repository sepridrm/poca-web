<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOutbondMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_outbond_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_outbond_material")->nullable();
            $table->foreign("id_outbond_material")->references("id")->on("outbond_materials");
            $table->unsignedBigInteger("id_sub_detail_inbond_material")->nullable();
            $table->foreign("id_sub_detail_inbond_material")->references("id")->on("sub_detail_inbond_materials");
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
        Schema::dropIfExists('detail_outbond_materials');
    }
}
