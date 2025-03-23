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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->decimal('weight', 8, 2);
            $table->json('sizes')->nullable();
            $table->json('colors')->nullable();
            $table->json('image');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->default(0)->nullable();
            $table->string('product_code')->unique();
            $table->string('product_sku')->unique();
            $table->enum('tag', ['Sale', 'Hot'])->nullable();
            // $table->integer(''); // Removed empty column
            $table->string('slug')->unique();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
