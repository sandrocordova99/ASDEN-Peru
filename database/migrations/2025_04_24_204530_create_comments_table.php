<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id(); // autoincremental
        $table->text('content');
        $table->string('author_name');
        $table->string('author_email')->nullable();
        $table->unsignedBigInteger('post_id');
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
    
        // Relación con la tabla posts
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    });
    
}


    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

