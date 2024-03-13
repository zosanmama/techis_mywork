<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name', 100)->index();
            $table->string('item_name', 100)->index();
            $table->string('status', 100)->default('active');
            $table->string('type', 100)->nullable();
            $table->string('detail', 500)->nullable();
            $table->integer('in_stock')->index();
            $table->integer('appr_inventory')->index();
            $table->integer('avr_daily_sales')->index();
            $table->integer('delivery_days')->index();
            $table->string('supplier', 100)->index();
            $table->integer('purchase_price')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
