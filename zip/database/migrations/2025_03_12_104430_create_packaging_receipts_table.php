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
        Schema::create('packaging_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_number')->unique();
            $table->string('jober_name');
            $table->string('quality');
            $table->decimal('size', 8, 2)->nullable();  // Nullable column
            $table->decimal('waist', 8, 2)->nullable();  // Nullable column
            $table->decimal('length', 8, 2)->nullable();  // Nullable column
            $table->decimal('girth', 8, 2)->nullable();  // Nullable column
            $table->string('interlock')->nullable();  // Nullable column
            $table->string('petticoat')->nullable(); // Nullable column
            $table->string('total_quantity')->nullable(); // Nullable column
            $table->boolean('is_delete')->default(0)->nullable(); // Nullable column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packaging_receipts');
    }
};
