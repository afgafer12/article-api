<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title', 200);
            $table->text('content');
            $table->string('category', 100);
            $table->timestamps();
            // $table->string('status', 100)->comment('publish|draft|trash');
            $table->enum('status', ['publish','draft','trash'])->comment('publish|draft|trash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
