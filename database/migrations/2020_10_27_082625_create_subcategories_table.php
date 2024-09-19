<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');
           
            $table->string('slug_bn')->unique();
           
            $table->boolean('show_on_header')->default(0);
            $table->boolean('status')->default(0);
           
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');;

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
        Schema::dropIfExists('subcategories');
    }
}
