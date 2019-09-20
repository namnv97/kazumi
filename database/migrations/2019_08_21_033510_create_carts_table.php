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
            $table->string('paypal_order_id',20)->nullable();

            $table->enum('payment_method',['online','atm','cod']);

            $table->enum('payment_status',[0,1])->comment('0: Chưa thanh toán, 1: Đã thanh toán')->default(0);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null');
            $table->string('phone',12);
            $table->double('total',12,2);
            $table->tinyInteger('status')->default(0)->comment('0: Chờ duyệt,1: Chờ giao hàng, 2: Đang giao hàng, 3: Giao hàng thành công, 4: Đơn hàng bị hủy');
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
