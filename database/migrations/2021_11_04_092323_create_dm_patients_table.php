<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dm_patients', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("doctor_id")->nullable();
            $table->string("initial");
            $table->foreign("doctor_id")->on("doctors")->references("id")->onDelete("set null");
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

        Schema::table("dm_patients", function (Blueprint $blueprint){

            $blueprint->dropForeign("dm_patients_doctor_id_foreign");

        });

        Schema::dropIfExists('dm_patients');
    }
}
