<?php

namespace App\Models;
use App\Models\Traits\TranslationslugTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud_two extends Model
{
    use HasFactory, TranslationslugTrait;

    protected $fillable = [
        'status',
        'tag_ids',
    ];
    protected $casts = [
        'tag_ids' => 'array', // tour_ids maydonini array sifatida qaytaradi
    ];

    /**
    * Get the categories
    *
    */



    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $locales = config('app.available_locales', ['ru', 'uz']); // Agar 'app.available_locales' mavjud bo'lmasa, standart qiymatlar
        foreach ($locales as $locale) {
            $this->fillable[] = "name_{$locale}";
            $this->fillable[] = "description_{$locale}";
            $this->fillable[] = "slug_{$locale}";
            $this->fillable[] = "keyword_{$locale}";
            $this->fillable[] = "meta_description_{$locale}";
        }

        // Umumiy maydonlar
        $this->fillable[] = 'image_path';
        $this->fillable[] = 'image_name';
    }
    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d.m.Y');
    }
    // Qolgan model metodlari va xususiyatlari
}
