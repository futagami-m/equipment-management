<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->index();
            $table->string('status', 100)->default('active');
            $table->smallInteger('type')->nullable();
            $table->integer('order_quantity')->default('0');
            $table->string('supplier', 500)->nullable();
            $table->date('deadline')->nullable();
            $table->string('order_name', 100)->nullable();
            $table->string('ordered_name', 100)->nullable();
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
}
