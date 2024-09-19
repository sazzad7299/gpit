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
            $table->id();
           
           
            
            $table->string('title_bn');
           
            $table->string('slug_bn')->unique();
            $table->string('image')->default('default.png');
           
            $table->text('details_bn');
            $table->text('details_bn_1')->nullable();
            $table->text('details_bn_2')->nullable();
            
            $table->string('tages_bn');
            
            $table->string('thumbnail')->nullable();
            $table->string('published_date');
            $table->boolean('status')->default(0);

            $table->unsignedBigInteger('user_id');


            $table->unsignedBigInteger('category_id');


            $table->unsignedBigInteger('subcategory_id')->nullable();


            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');


            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');


            $table->foreign('subcategory_id')
            ->references('id')->on('subcategories')
            ->onDelete('cascade');

            
            $table->timestamps();
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
