<?php

namespace Tests\Unit;

use App\Models\Backend\CustomerModel;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CustomerModelTest extends TestCase
{
    #[Test]
    public function it_exposes_labels_for_each_customer_type(): void
    {
        $labels = [
            'company' => 'บริษัท / นิติบุคคล',
            'individual' => 'บุคคลธรรมดา',
            'government' => 'หน่วยงานราชการ',
            'other' => 'อื่น ๆ',
        ];

        foreach ($labels as $type => $label) {
            $customer = new CustomerModel(['customer_type' => $type]);
            $this->assertSame($label, $customer->type_label);
        }
    }

    #[Test]
    public function it_marks_customer_ready_when_name_and_document_address_exist(): void
    {
        $customer = new CustomerModel([
            'name' => 'บริษัท ตัวอย่าง จำกัด',
            'address' => '99 ถนนสุขุมวิท',
        ]);

        $this->assertTrue($customer->document_ready);

        $customer->address = null;
        $this->assertFalse($customer->document_ready);
    }

    #[Test]
    public function it_builds_a_full_document_address(): void
    {
        $customer = new CustomerModel([
            'address' => '99 ถนนสุขุมวิท',
            'subdistrict' => 'คลองเตย',
            'district' => 'คลองเตย',
            'province' => 'กรุงเทพมหานคร',
            'postal_code' => '10110',
        ]);

        $this->assertSame(
            '99 ถนนสุขุมวิท ต.คลองเตย อ.คลองเตย จ.กรุงเทพมหานคร 10110',
            $customer->full_address
        );
    }
}
