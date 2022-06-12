<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'preco',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function formatPrice()
    {
        return number_format((floatval($this->preco)), 2, ",", "");
    }
}
