<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('product_id');
            $table->String('product_name');
            $table->String('product_cat_name');
            $table->String('product_sub_name');
            $table->String('product_price');
            $table->String('product_desc');
            $table->String('product_color');
            $table->String('product_size');
            $table->String('product_image');
            $table->String('product_mimage');
            $table->Integer('product_status');
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
