<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->nullable();
            $table->integer('faq_id')->nullable();
            $table->integer('tag_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('short_desc')->nullable();
            $table->string('description')->nullable();
            $table->string('short_image')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
