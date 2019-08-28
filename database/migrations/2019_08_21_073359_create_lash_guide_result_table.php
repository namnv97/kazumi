<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLashGuideResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lash_guide_result', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_eye_id');
            $table->unsignedBigInteger('placement_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('length_id');
            $table->unsignedBigInteger('style_id');
            $table->unsignedBigInteger('expirience_id');
            $table->unsignedBigInteger('event_id');
            $table->string('product_results');
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
        Schema::dropIfExists('lash_guide_result');
    }
}
