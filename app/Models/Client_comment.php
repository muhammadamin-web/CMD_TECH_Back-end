<?php

namespace App\Models;
use App\Models\Traits\TranslationslugTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_comment extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // config/app.php faylidan olingan tillar ro'yxatidan foydalanamiz
        $locales = config('app.available_locales', ['ru', 'uz']); // Agar 'app.available_locales' mavjud bo'lmasa, standart qiymatlar
        foreach ($locales as $locale) {
            $this->fillable[] = "name_{$locale}";
            $this->fillable[] = "comment_{$locale}";
        }

        // Umumiy maydonlar
        $this->fillable[] = 'image_path';
        $this->fillable[] = 'image_name';
    }

    // Qolgan model metodlari va xususiyatlari
}
