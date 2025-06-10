<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->unsigned();
            $table->string('heading');
            $table->enum('category', ['technology', 'business', 'entertainment', 'science', 'travel']);
            $table->string('description');
            $table->string('image');
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('news_admins');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
