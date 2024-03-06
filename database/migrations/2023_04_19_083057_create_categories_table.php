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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Endi bu yerda config faylidan olingan tillar ro'yxatidan foydalanamiz
            $locales = config('app.available_locales', ['ru', 'uz']);
            foreach ($locales as $locale) {
                $table->string("name_{$locale}");
                $table->string("slug_{$locale}");

            }

            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
