<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart-items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->boolean('payed')->default(false);
            $table->timestamps();
        });
        Schema::table('skus', function (Blueprint $table) {
            $table->unsignedBigInteger('sku_id')->nullable();
            $table->foreign('sku_id')->references('id')->on('skus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skus', function (Blueprint $table) {
            $table->dropForeign('products_sku_id_foreign');
            $table->dropColumn('sku_id');
        });
        Schema::dropIfExists('cart-items');
    }
}
