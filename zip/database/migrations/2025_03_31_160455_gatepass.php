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
        Schema::create('gate_pass', function (Blueprint $table) {
            $table->id();
            $table->string('packaging_id')->nullable(); // Make nullable
            $table->string('than')->nullable();
            $table->string('meter')->nullable();
            $table->string('delivery_location')->nullable();
            $table->string('car_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
