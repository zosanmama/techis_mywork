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
            $table->string('status', 100)->index();
            $table->string('type', 100)->nullable();
            $table->string('detail', 500)->nullable();
            $table->string('in_stock', 100)->index();
            $table->string('appr_inventory', 100)->index();
            $table->string('avr_daily_sales', 100)->index();
            $table->string('delivery_days', 100)->index();
            $table->string('supplier', 100)->index();
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
