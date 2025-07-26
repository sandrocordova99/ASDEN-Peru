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
        Schema::create('posts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
          
            $table->text('resumen');
            $table->longText('tags');

            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('user_a_s_d_e_n_s')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /*
    
     'title' => $request->title,
                'resumen' => $request->resumen,
                'content' => $request->content,
                'image' => $request->image,
                'tags' => $request->tags,
                'status' => $request->status,
              //  'published_at' => $request->status === 'published' ? now() : null,
                'user_id' => $user->id,  
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_posts');
    }
};
