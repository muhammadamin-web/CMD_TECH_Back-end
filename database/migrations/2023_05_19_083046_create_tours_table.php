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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
        
            // Endi bu yerda config faylidan olingan tillar ro'yxatidan foydalanamiz
            $locales = config('app.available_locales', ['ru', 'uz']);
            foreach ($locales as $locale) {
                $table->string("name_{$locale}");
                $table->string("short_name_{$locale}");
                $table->string("slug_{$locale}");
                $table->text("description_{$locale}");
                $table->text("meta_description_{$locale}");
                $table->string("tags_{$locale}")->nullable();
            }
            $table->string('price')->nullable();
            $table->json('images'); // Rasmlar ro'yxati JSON formatida
            $table->string('status')->default('published');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.  
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
