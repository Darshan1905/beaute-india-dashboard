<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->string('training_number');
            
            $table->bigInteger('customer_id');
            $table->string('customer_contact');
       
            $table->double('amount');
           
            $table->double('Paid_total');
            
            $table->double('total');
            $table->bigInteger('Coupon_id');
            $table->string('shop_id');
           
            $table->string('Payment_id');
            $table->string('Payment_gateway');
            $table->string('Shipping_address');
            $table->string('Billing_Address');
            $table->string('Logistics_provider');
            $table->string('Deleivery_fee');
            $table->string('Product');
            $table->string('delivery_time');
            $table->string('sals_tax');
            // $table->bigIncrements('Order No.');
            $table->string('sku');
            $table->string('brand');
            $table->string('Product name');
            $table->string('product quantity');
            $table->string('cod fee');
            $table->integer('product selling price');
            $table->integer('MRP value');
            $table->string('GMV Value');
            $table->string('Disc%Slab');
            $table->string('Coupon Code');
            $table->bigInteger('Customer Code');
            $table->string('Customer name');
            $table->string('Customer Email');
            $table->string('Customer mobile');
            $table->string('Address Line 1');
            $table->string('Address Line 2');
            $table->string('Address city');
            $table->string('Address state');
            $table->string('Date');
            $table->string('Store');
            $table->string('Shipping Charges');
            $table->string('Discount');
            $table->string('Total Amount');
            $table->string('Payment Method');
            $table->string('Billing Address');
            $table->string('Address pincode');
            $table->string('Shipping Address');
            $table->string('status');
            $table->string('Action');
            
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
        Schema::dropIfExists('order');
    }
}
