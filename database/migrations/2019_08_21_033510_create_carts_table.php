<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->integer('zip_code');
            $table->double('total',12,2);
            $table->tinyInteger('status')->default(1)->comment('1: Chờ giao hàng, 2: Đang giao hàng, 3: Giao hàng thành công, 4: Đơn hàng bị hủy');
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
        Schema::dropIfExists('carts');
    }
}
