<?php

// Fixed development fixtures only: price and stock are illustrative, not supplier data.
// Monetary amounts in this source are baht; normalize to integer satang below.
$rows = [
    ['DEMO-T001', 'MICHELIN', 'Pilot Sport EV', 'tire', '255/45R19', 13350, 14000, 24, 'เส้น', 'product-L01.jpg'],
    ['DEMO-T002', 'MICHELIN', 'e.Primacy', 'tire', '215/55R18', 6900, 7500, 12, 'เส้น', 'product-L02.jpg'],
    ['DEMO-T003', 'OTANI', 'KC2000', 'tire', '225/45R18', 2850, null, 40, 'เส้น', 'product-L03.jpg'],
    ['DEMO-T004', 'OTANI', 'KN1000', 'tire', '215/50R19', 3200, 3600, 0, 'เส้น', 'product-L04.jpg'],
    ['DEMO-T005', 'ARISUN', 'Z-108', 'tire', '235/45R18', 2450, null, 8, 'เส้น', 'product-L05.jpg'],
    ['DEMO-T006', 'ARISUN', 'Aggressor', 'tire', '225/75R15C', 4100, 4500, 0, 'เส้น', 'product-L01.jpg'],
    ['DEMO-T007', 'MICHELIN', 'Primacy 4', 'tire', '225/50R17', 5800, null, 16, 'เส้น', 'product-L02.jpg'],
    ['DEMO-T008', 'OTANI', 'EK1000', 'tire', '205/55R16', 2100, 2400, 32, 'เส้น', 'product-L03.jpg'],
    ['DEMO-T009', 'MICHELIN', 'Pilot Sport 5', 'tire', '245/40R19', 8900, null, 4, 'เส้น', 'product-L04.jpg'],
    ['DEMO-T010', 'ARISUN', 'ZP01', 'tire', '195/65R15', 1850, 2100, 50, 'เส้น', 'product-L05.jpg'],
    ['DEMO-T011', 'OTANI', 'SA2000', 'tire', '265/60R18', 3950, null, 10, 'เส้น', 'product-L01.jpg'],
    ['DEMO-T012', 'MICHELIN', 'Latitude Sport 3', 'tire', '255/50R20', 10200, 11000, 6, 'เส้น', 'product-L02.jpg'],
    ['DEMO-C001', 'AUTO HUB', 'Portable Charger 3.5 kW', 'charger', '', 6350, 7500, 15, 'เครื่อง', 'product-02.jpg'],
    ['DEMO-C002', 'AUTO HUB', 'Wall Charger 7 kW', 'charger', '', 13500, 15000, 7, 'เครื่อง', 'product-02.jpg'],
    ['DEMO-C003', 'AUTO HUB', 'Wall Charger 11 kW', 'charger', '', 19500, null, 0, 'เครื่อง', 'product-02.jpg'],
    ['DEMO-C004', 'AUTO HUB', 'Wall Charger 22 kW', 'charger', '', 24500, 27000, 3, 'เครื่อง', 'product-02.jpg'],
    ['DEMO-C005', 'AUTO HUB', 'Portable Charger 7 kW', 'charger', '', 9900, null, 9, 'เครื่อง', 'product-02.jpg'],
    ['DEMO-C006', 'AUTO HUB', 'AC Charger Type 2', 'charger', '', 15900, 17500, 5, 'เครื่อง', 'product-02.jpg'],
];

return array_map(function (array $row): array {
    [$sku, $brand, $name, $category, $size, $price, $oldPrice, $stock, $unit, $image] = $row;
    return [
        'sku' => $sku, 'brand' => $brand, 'name' => $name, 'category' => $category,
        'size' => $size, 'price_satang' => $price * 100,
        'compare_at_satang' => $oldPrice === null ? null : $oldPrice * 100,
        'stock' => $stock, 'unit' => $unit, 'image' => 'frontend-assets/images/'.$image,
        'description' => $category === 'tire'
            ? 'ยางรถยนต์ '.$brand.' '.$name.' ขนาด '.$size.' — รายละเอียดตัวอย่างสำหรับเตรียมเชื่อมข้อมูลสินค้า'
            : 'เครื่องชาร์จรถยนต์ไฟฟ้า '.$name.' — รายละเอียดตัวอย่าง ต้องตรวจสอบสเปกและความเข้ากันได้จากข้อมูลจริงก่อนสั่งซื้อ',
    ];
}, $rows);