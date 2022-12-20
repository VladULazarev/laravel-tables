<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('category_id');
            $table->date('order_date');
            $table->integer('unit_amount');
            $table->float('total_sum', 8, 2);
            $table->integer('order_status_id');
            $table->string('comments', 100);
            $table->date('shipped_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
