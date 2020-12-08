<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutbondMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbond_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_detail_inbond_material")->nullable();
            $table->foreign("id_detail_inbond_material")->references("id")->on("detail_inbond_materials");
            $table->integer('qty')->nullable(false);
            $table->string('mind',100)->nullable(false);
            $table->text('path_foto')->nullable(false);
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
        Schema::dropIfExists('outbond_materials');
    }
}
