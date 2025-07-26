<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('user_a_s_d_e_n_s', function (Blueprint $table) {
            $table->timestamp('password_reset_expires_at')->nullable()->after('invitation_expires_at');
        });
    }
};
