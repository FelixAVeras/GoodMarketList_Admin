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
            $table->string('barcode')->nullable();
            $table->string('name');
            $table->string('unit');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->decimal('average_price', 10, 2);
            $table->string('image_url')->nullable();
            $table->boolean('isAvailable')->default(true);
            // $table->foreignId('market_id')->constrained()->onDelete('cascade');
            $table->foreignId('market_id')->nullable()->constrained()->onDelete('cascade');
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
