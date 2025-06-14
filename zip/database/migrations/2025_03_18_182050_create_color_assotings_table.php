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
        Schema::create('color_assortings', function (Blueprint $table) {
            $table->id();
            $table->string('packaging_slip_id')->nullable(); // Make nullable
            $table->string('color')->nullable(); // Make nullable
            $table->string('quantity')->nullable(); // Make nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_assortings');
    }
};
