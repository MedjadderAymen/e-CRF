<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_logs', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("consent_id");
            $table->string("q1")->nullable();
            $table->string("q2")->nullable();
            $table->string("q3")->nullable();
            $table->string("q3_1")->nullable();
            $table->string("q4")->nullable();
            $table->string("q5")->nullable();
            $table->string("q6")->nullable();
            $table->string("q7")->nullable();
            $table->string("q8")->nullable();
            $table->string("q9")->nullable();
            $table->string("q10")->nullable();
            $table->foreign("consent_id")->on("consents")->references("id")->onDelete("cascade");
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

        Schema::table("device_logs", function (Blueprint  $blueprint){
            $blueprint->dropForeign("device_logs_consent_id_foreign");
        });


        Schema::dropIfExists('device_logs');
    }
}
