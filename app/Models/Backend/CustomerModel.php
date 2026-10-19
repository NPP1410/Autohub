<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_customer';

    protected $fillable = [
        'code',
        'customer_type',
        'name',
        'tax_id',
        'branch_code',
        'branch_name',
        'contact_name',
        'phone',
        'email',
        'address',
        'subdistrict',
        'district',
        'province',
        'postal_code',
        'credit_days',
        'note',
        'isActive',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'credit_days' => 'integer',
    ];

    public function getTypeLabelAttribute(): string
    {
        return match ($this->customer_type) {
            'company' => 'บริษัท / นิติบุคคล',
            'individual' => 'บุคคลธรรมดา',
            'government' => 'หน่วยงานราชการ',
            default => 'อื่น ๆ',
        };
    }

    public function getDocumentReadyAttribute(): bool
    {
        return filled($this->name) && filled($this->address);
    }

    public function getFullAddressAttribute(): string
    {
        return collect([
            $this->address,
            $this->subdistrict ? 'ต.' . $this->subdistrict : null,
            $this->district ? 'อ.' . $this->district : null,
            $this->province ? 'จ.' . $this->province : null,
            $this->postal_code,
        ])->filter()->implode(' ');
    }
}
