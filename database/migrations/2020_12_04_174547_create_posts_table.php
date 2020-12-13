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
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title', 100)->unique();
            $table->string('content', 2000);
            $table->unsignedInteger('category_id')->nullable();
            $table->string('slug', 200)->unique();
            $table->string('image', 100)->nullable();
            $table->timestamps();
        });
            Schema::table('posts', function(Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
            Schema::table('posts', function(Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('categories')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
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
