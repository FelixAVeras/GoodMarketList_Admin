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
            $table->string('product_code')->nullable()->unique(); // Código de producto
            $table->string('barcode')->nullable(); // Código de barras
            $table->string('name'); // Nombre del producto
            $table->string('unit'); // Unidad de medida (ej: kg, litro, unidad)
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relación con la categoría
            $table->decimal('average_price', 10, 2); // Precio promedio
            $table->string('image_url')->nullable(); // URL de la imagen
            $table->boolean('isAvailable')->default(true);
            $table->foreignId('market_id')->constrained()->onDelete('cascade');
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
