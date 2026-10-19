
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
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
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    // ค้นหากลุ่มสินค้าด้วย Keyword
    public function scopeSearch(
        Builder $query,
        ?string $keyword
    ): Builder {
        $keyword = trim($keyword ?? '');

        if ($keyword === '') {
            return $query;
        }

        return $query->where(function (Builder $q) use ($keyword) {
            $q->where('category_id', 'like', "%{$keyword}%")
              ->orWhere('name', 'like', "%{$keyword}%")
              ->orWhere('name_th', 'like', "%{$keyword}%")
              ->orWhere('name_en', 'like', "%{$keyword}%");
        });
    }

    // หมวดสินค้าย่อย
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    // Keyword ที่ผูกกับกลุ่มสินค้า
    public function tagCategories()
    {
        return $this->hasMany(TagCategory::class, 'category_id');
    }
}
