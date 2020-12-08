<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_role")->nullable();
            $table->foreign("id_role")->references("id")->on("roles");
            $table->unsignedBigInteger("id_team")->nullable();
            $table->foreign("id_team")->references("id")->on("teams");
            $table->string('nama',100)->nullable(false);
            $table->string('email',100)->nullable(false)->unique();
            $table->string('nomor_telepon',15)->nullable(false);
            $table->text('password')->nullable(false);
            $table->text('path_foto')->nullable(false);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('pegawais');
    }
}
