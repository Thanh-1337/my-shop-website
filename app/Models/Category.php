<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['slug', 'name'];

    // Thiết lập mối quan hệ: Một danh mục có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
