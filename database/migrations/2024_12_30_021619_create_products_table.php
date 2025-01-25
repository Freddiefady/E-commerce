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
            $table->text('small_description');
            $table->longText('description');
            $table->boolean('status')->default(1);
            $table->string('sku');
            $table->date('avaliable_for')->nullable();
            $table->integer('views')->default(0);
            $table->decimal('price', 8, 3);
            $table->decimal('discount');
            $table->date('start_discount')->nullable();
            $table->date('end_discount')->nullable();
            $table->boolean('manage_stock')->default(false);
            $table->integer('quantity');
            $table->integer('avaliable_in_stock')->default(true);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
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
