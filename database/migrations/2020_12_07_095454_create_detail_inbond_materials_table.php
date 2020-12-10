<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInbondMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_inbond_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_inbond_material")->nullable();
            $table->foreign("id_inbond_material")->references("id")->on("inbond_materials");
            $table->unsignedBigInteger("id_material")->nullable();
            $table->foreign("id_material")->references("id")->on("materials");
            $table->integer('qty')->nullable(false);
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
        Schema::dropIfExists('detail_inbond_materials');
    }
}
