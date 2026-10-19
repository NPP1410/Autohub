<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'subcategory_id',
        'category_id',
        'name',
        'name_th',
        'name_en',
        'description',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'category_id' => 'integer',
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    // Subcategory เป็นของ Category หนึ่งรายการ
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tagCategories()
{
    return $this->hasMany(TagCategory::class, 'subcategory_id');
}

    // ค้นหาจากรหัสหรือชื่อหมวดหมู่ย่อย
    public function scopeSearch(
        Builder $query,
        ?string $keyword
    ): Builder {
        $keyword = trim($keyword ?? '');

        if ($keyword === '') {
            return $query;
        }

        return $query->where(function (Builder $q) use ($keyword) {
            $q->where('subcategory_id', 'like', "%{$keyword}%")
                ->orWhere('name', 'like', "%{$keyword}%")
                ->orWhere('name_th', 'like', "%{$keyword}%")
                ->orWhere('name_en', 'like', "%{$keyword}%");
        });
    }
}
