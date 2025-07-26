<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('user_a_s_d_e_n_s', function (Blueprint $table) {
         
            if (Schema::hasColumn('user_a_s_d_e_n_s', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }

           
            $table->timestamp('invitation_expires_at')
                ->nullable()
                ->after('invitation_token')
                ->comment('Fecha de expiración del enlace de invitación');
        });
    }

    public function down()
    {
        Schema::table('user_a_s_d_e_n_s', function (Blueprint $table) {
          
            $table->timestamp('email_verified_at')->nullable();
            $table->dropColumn('invitation_expires_at');
        });
    }
};
