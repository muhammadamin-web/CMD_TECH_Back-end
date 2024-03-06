<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',

        // Lokalizatsiya qilingan maydonlar uchun o'zgaruvchilar qo'shiladi
    ];
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
