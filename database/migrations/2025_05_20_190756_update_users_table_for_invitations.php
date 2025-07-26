<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('user_a_s_d_e_n_s', function (Blueprint $table) {
        $table->string('password')->nullable()->change();
        $table->string('invitation_token')->nullable()->after('password');
        $table->dropColumn(['email_verification_token']); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('user_a_s_d_e_n_s', function (Blueprint $table) {
        $table->string('password')->nullable(false)->change(); // Revertir
        $table->string('email_verification_token')->nullable();
        $table->dropColumn('invitation_token');
    });
}
};
