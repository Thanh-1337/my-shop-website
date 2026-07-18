<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'category_id', 'image', 'rating', 'reviews', 'desc', 'specs'
    ];

    protected $casts = [
        'specs' => 'array',
        'price' => 'integer',
        'rating' => 'float',
        'reviews' => 'integer',
    ];

    // Thiết lập mối quan hệ: Sản phẩm thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
