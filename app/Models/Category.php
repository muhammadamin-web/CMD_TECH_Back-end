<?php

namespace App\Models;

use App\Models\Traits\TranslationslugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, TranslationslugTrait;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // config/app.php faylidan olingan tillar ro'yxatidan foydalanamiz
        $locales = config('app.available_locales', ['ru', 'uz']); // Agar 'app.available_locales' mavjud bo'lmasa, standart qiymatlar
        foreach ($locales as $locale) {
            $this->fillable[] = "name_{$locale}";
            $this->fillable[] = "slug_{$locale}";
        }

        // Umumiy maydonlar
        $this->fillable[] = 'image_path';
        $this->fillable[] = 'image_name';
    }

    // public function tours()
    // {
    //     return $this->hasMany(Tour::class);
    // }

    // Qolgan model metodlari va xususiyatlari
}
