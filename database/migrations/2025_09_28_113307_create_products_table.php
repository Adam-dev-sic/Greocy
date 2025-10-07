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
            $table->string("name");
            $table->enum("quantity", ["1kg", '1piece', '100g']);
            $table->decimal('price', 8, 2);
            $table->foreignId('admin_id')->constrained('shops')->onDelete('cascade');
            $table->string("image")->nullable();
            $table->enum('tag', [
                'Fruits',
                'Vegetables',
                'Poultry and meat',
                'Fish',
                'Bakery',
                'Snacks',
                'Others'
            ]);

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
