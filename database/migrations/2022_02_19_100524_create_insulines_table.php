<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsulinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insulines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('crf_id');
            $table->string('tag');
            $table->foreign('crf_id')->references("id")->on("crves")->onDelete("cascade");
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

        Schema::table("insulines", function (Blueprint $blueprint){

            $blueprint->dropForeign("insulines_crf_id_foreign");

        });

        Schema::dropIfExists('insulines');
    }
}
