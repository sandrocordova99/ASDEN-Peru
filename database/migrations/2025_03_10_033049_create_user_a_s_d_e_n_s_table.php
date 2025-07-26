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
        Schema::create('user_a_s_d_e_n_s', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable(); 
            $table->text('bio')->nullable(); 
            $table->enum('role', ['admin', 'user'])->default('user'); 
            $table->timestamps(); 

            $table->string('email_verification_token')->nullable();  
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('user_a_s_d_e_n_s');
    }
};
