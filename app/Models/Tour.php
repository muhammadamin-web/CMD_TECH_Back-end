<?php

namespace App\Models;

use App\Models\Traits\TranslationslugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
{
    use HasFactory, TranslationslugTrait;

    protected $fillable = [
        'images',
        'status',
        'price',
        // Lokalizatsiya qilingan maydonlar uchun o'zgaruvchilar qo'shiladi
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    
        // config/app.php faylidan olingan tillar ro'yxatidan foydalanamiz
        $locales = config('app.available_locales', ['ru', 'uz']);
        foreach ($locales as $locale) {
            foreach (['name', 'short_name', 'description', 'slug', 'tags', 'meta_description'] as $field) {
                $this->fillable[] = "{$field}_{$locale}";
            }
        }
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    // Qolgan model metodlari va xususiyatlari
}

