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
    $table->string('slug')->unique();

    $table->text('description')->nullable();

    $table->string('sku')->unique();

    $table->decimal('price_net',10,2);
    $table->decimal('price_gross',10,2);

    $table->decimal('vat_rate',5,2);

    $table->integer('stock')->default(0);

    $table->string('status')->default('draft');

    $table->foreignId('category_id')
        ->nullable()
        ->constrained()
        ->nullOnDelete();

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
