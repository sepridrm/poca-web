<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_leaders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pegawai")->nullable();
            $table->foreign("id_pegawai")->references("id")->on("pegawais");
            $table->unsignedBigInteger("id_team")->nullable();
            $table->foreign("id_team")->references("id")->on("teams");
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
        Schema::dropIfExists('team_leaders');
    }
}
