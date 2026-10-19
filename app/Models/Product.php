<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // Primary Key
    protected $primaryKey = 'id';

    // Auto Increment
    public $incrementing = true;

    protected $keyType = 'int';

    // อนุญาตให้บันทึกข้อมูลเหล่านี้
    protected $fillable = [
        'product_id',
        'product_name',
        'product_name_en',
        'product_buy',
        'product_buy_en',
        'sell_detail',
        'buy_detail',
        'sell_price',
        'buy_price',
        'floor_price',
        'vat',
        'pvat',
        'discount',
        'status',
        'type',
        'acc_sell',
        'acc_buy',
        'acc_whmr',
        'acc_whgr',
        'acc_begin',
        'acc_end',
        'acc_inventory',
        'acc_cost',
        'category',
        'sub_category',
        'unit',
        'tag',
        'thumbnail',
        'std_cost',
        'po_rule',
        'brand',
        'reorder_point',
        'maximum_stock',
        'product_for',
        'weight',
        'contact_id',
        'life',
        'yield',
        'obsolete',
        'restrict',
        'eordering',
        'activate_reorder',
        'activate_maxstock',
        'mkt',
        'originate',
        'follow_category',
        'tariff_code',
        'distributor',
    ];

    public function barcodes()
{
    return $this->hasMany(
        Barcode::class,
        'product_id',
        'product_id'
    );
}

    // กำหนดชนิดข้อมูล
    protected function casts(): array
    {
        return [
            'sell_price' => 'decimal:2',
            'buy_price' => 'decimal:2',
            'floor_price' => 'decimal:2',
            'vat' => 'decimal:2',
            'pvat' => 'decimal:2',
            'discount' => 'decimal:2',
            'status' => 'boolean',
            'obsolete' => 'boolean',
            'restrict' => 'boolean',
            'eordering' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}