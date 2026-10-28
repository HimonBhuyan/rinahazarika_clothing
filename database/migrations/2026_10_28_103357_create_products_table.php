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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('assamese_name')->nullable();
            $table->string('slug')->unique();
            $table->string('sku')->unique()->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->text('craft_story')->nullable();
            $table->string('material_type'); // e.g. Pure Muga Silk, Paat Silk, Eri Silk, Gold-Plated Brass
            $table->string('motif')->nullable(); // Kingkhap, Kolka, Gamusa, etc.
            $table->string('origin')->default('Sualkuchi, Assam');
            $table->decimal('price', 10, 2);
            $table->decimal('original_price', 10, 2)->nullable();
            $table->integer('stock_quantity')->default(10);
            $table->boolean('in_stock')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_bihu_special')->default(false);
            $table->boolean('is_new')->default(false);
            $table->decimal('rating', 3, 2)->default(5.00);
            $table->unsignedInteger('reviews_count')->default(0);
            $table->string('badge')->nullable(); // e.g. "Silk Mark Certified", "Heritage Royal Piece"
            $table->string('dimensions')->nullable();
            $table->text('care_instructions')->nullable();
            $table->string('color_name')->nullable();
            $table->string('color_hex')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
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
