<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("dm_patient_id");
            $table->boolean("consent_state");
            $table->string("signature_date");
            $table->string("signature_hour");
            $table->text("comment");
            $table->string("q1")->nullable();
            $table->string("q2")->nullable();
            $table->string("q3")->nullable();
            $table->string("q4")->nullable();
            $table->string("consent_person_name")->nullable();
            $table->foreign("dm_patient_id")->on("dm_patients")->references("id")->onDelete("cascade");
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

        Schema::table("consents", function (Blueprint  $blueprint){
           $blueprint->dropForeign("consents_dm_patient_id_foreign");
        });

        Schema::dropIfExists('consents');
    }
}
