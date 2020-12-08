<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInbondMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbond_materials', function (Blueprint $table) {
            $table->id();
            $table->string('du_id',100)->nullable(false)->unique();
            $table->string('du_name',100)->nullable(false);
            $table->unsignedBigInteger("id_sub_region")->nullable();
            $table->foreign("id_sub_region")->references("id")->on("sub_regions");
            $table->unsignedBigInteger("id_operator")->nullable();
            $table->foreign("id_operator")->references("id")->on("operators");
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
        Schema::dropIfExists('inbond_materials');
    }
}
