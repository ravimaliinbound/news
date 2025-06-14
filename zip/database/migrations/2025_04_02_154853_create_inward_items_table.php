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
        Schema::create('inward_items', function (Blueprint $table) {
            $table->id();
            $table->string('packaging_id')->nullable();
            $table->string('item_id')->nullable();
            $table->string('ware_house_id')->nullable();
            $table->string('gate_pass_id')->nullable();
            $table->string('inward_quantity')->nullable();
            $table->timestamp('date')->nullable(); // <-- added this
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inward_items');
    }
};
