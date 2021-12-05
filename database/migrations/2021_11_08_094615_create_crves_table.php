<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crves', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("consent_id");
            $table->string("q1")->nullable();
            $table->string("q2")->nullable();
            $table->string("q3")->nullable();
            $table->string("q4")->nullable();
            $table->string("q5")->nullable();
            $table->string("q6")->nullable();
            $table->string("q7")->nullable();
            $table->string("q8")->nullable();
            $table->string("q9")->nullable();
            $table->string("q10")->nullable();
            $table->string("q11")->nullable();
            $table->string("q12")->nullable();
            $table->string("q13")->nullable();
            $table->string("q141")->nullable();
            $table->string("q142")->nullable();
            $table->string("q15")->nullable();
            $table->string("q151")->nullable();
            $table->string("q152")->nullable();
            $table->string("q153")->nullable();
            $table->string("q16")->nullable();
            $table->string("q17")->nullable();
            $table->string("q18")->nullable();
            $table->string("q19")->nullable();
            $table->string("q19b")->nullable();
            $table->string("q20")->nullable();
            $table->string("q21")->nullable();
            $table->string("q21b")->nullable();
            $table->string("q22")->nullable();
            $table->string("q23")->nullable();
            $table->string("q24")->nullable();
            $table->string("q25")->nullable();
            $table->string("q26")->nullable();
            $table->string("q27")->nullable();
            $table->string("q28")->nullable();
            $table->string("q29")->nullable();
            $table->string("q30")->nullable();
            $table->string("q31")->nullable();
            $table->string("q32")->nullable();
            $table->string("q33")->nullable();
            $table->string("q34")->nullable();
            $table->string("q35")->nullable();
            $table->string("q36")->nullable();
            $table->string("q37")->nullable();
            $table->string("q38")->nullable();
            $table->string("signature_date");
            $table->string("investigator_name");
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
        Schema::table("crves", function (Blueprint  $blueprint){
            $blueprint->dropForeign("crves_consent_id_foreign");
        });

        Schema::dropIfExists('crves');
    }
}
