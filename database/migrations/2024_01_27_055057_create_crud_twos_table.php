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
        Schema::create('crud_twos', function (Blueprint $table) {
            $table->id();

            // Endi bu yerda config faylidan olingan qiymatlardan foydalanamiz
            $locales = config('app.available_locales', ['ru', 'uz']);
            foreach ($locales as $locale) {
                $table->string("name_{$locale}");
                $table->string("slug_{$locale}");
                $table->text("description_{$locale}");
                $table->text("meta_description_{$locale}");
                $table->string("keyword_{$locale}")->nullable();

            }
         
            $table->string('status')->default('published');
            $table->json('tag_ids'); // JSON maydoni sifatida qo'shamiz
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
        Schema::dropIfExists('crud_twos');
    }
};
