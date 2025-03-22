<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sizes',
                'colors',
                'description',
                'product_code',
                'stock',
                'product_sku',
                'meta_title',
                'meta_description'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
            $table->text('description')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('stock')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
        });
    }
}
