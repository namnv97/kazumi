<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddPaypalOrderIdAndShippingMethodCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('paypal_order_id',20)->after('city')->nullable();

            $table->enum('payment_method',['online','atm','cod'])->after('paypal_order_id');

            $table->enum('payment_status',[0,1])->after('payment_method')->comment('0: Chưa thanh toán, 1: Đã thanh toán')->default(0);
            $table->unsignedBigInteger('discount_id')->after('payment_method')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
            $table->string('phone',12)->after('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            //
        });
    }
}
