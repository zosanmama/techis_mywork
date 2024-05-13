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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->default('01');
            $table->string('employee_id')->nullable()->default('');
            $table->string('superuser')->default('YES');
            $table->string('status')->default('active');
            $table->string('surname');
            $table->string('givenname'); 
            $table->string('surname_rubi')->nullable()->default('');
            $table->string('givenname_rubi')->nullable()->default(''); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
