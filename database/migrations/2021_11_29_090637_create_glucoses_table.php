<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlucosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glucoses', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("consent_id");
            $table->string("analyser_device")->default("YSI 2500");
            $table->string("anticoagulant_type")->default("Lithium Heparine");
            $table->string("strips");
            $table->string("glucometer");
            $table->string("solution_control_a");
            $table->string("solution_control_b");
            $table->string("analyse_date");

            $table->string("ysi_one_value")->nullable();

            $table->string("ysi_one_value_lot_a_gluco_a_bandelette")->nullable();
            $table->string("ysi_one_value_lot_a_gluco_a_bandelette_result")->nullable();
            $table->string("ysi_one_value_lot_a_gluco_b_bandelette")->nullable();
            $table->string("ysi_one_value_lot_a_gluco_b_bandelette_result")->nullable();

            $table->string("ysi_two_value_lot_b_gluco_a_bandelette")->nullable();
            $table->string("ysi_two_value_lot_b_gluco_a_bandelette_result")->nullable();
            $table->string("ysi_two_value_lot_b_gluco_b_bandelette")->nullable();
            $table->string("ysi_two_value_lot_b_gluco_b_bandelette_result")->nullable();

            $table->string("ysi_three_value_lot_c_gluco_a_bandelette")->nullable();
            $table->string("ysi_three_value_lot_c_gluco_a_bandelette_result")->nullable();
            $table->string("ysi_three_value_lot_c_gluco_b_bandelette")->nullable();
            $table->string("ysi_three_value_lot_c_gluco_b_bandelette_result")->nullable();

            $table->string("post_ysi_value")->nullable();

            //*****************************************************************************************************************************************

            $table->string("edited_sample_value")->nullable();

            $table->string("edited_sample_value_lot_a_gluco_a_bandelette")->nullable();
            $table->string("edited_sample_value_lot_a_gluco_a_bandelette_result")->nullable();
            $table->string("edited_sample_value_lot_a_gluco_b_bandelette")->nullable();
            $table->string("edited_sample_value_lot_a_gluco_b_bandelette_result")->nullable();

            $table->string("edited_sample_value_lot_b_gluco_a_bandelette")->nullable();
            $table->string("edited_sample_value_lot_b_gluco_a_bandelette_result")->nullable();
            $table->string("edited_sample_value_lot_b_gluco_b_bandelette")->nullable();
            $table->string("edited_sample_value_lot_b_gluco_b_bandelette_result")->nullable();

            $table->string("edited_sample_value_lot_c_gluco_a_bandelette")->nullable();
            $table->string("edited_sample_value_lot_c_gluco_a_bandelette_result")->nullable();
            $table->string("edited_sample_value_lot_c_gluco_b_bandelette")->nullable();
            $table->string("edited_sample_value_lot_c_gluco_b_bandelette_result")->nullable();

            $table->string("identity")->default("glyc vitalcheck");
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

        Schema::table("glucoses", function (Blueprint  $blueprint){
            $blueprint->dropForeign("glucoses_consent_id_foreign");
        });

        Schema::dropIfExists('glucoses');
    }
}
