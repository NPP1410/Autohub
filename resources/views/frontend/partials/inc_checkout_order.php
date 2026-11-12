<?php
// Shared demo order for the checkout and confirmation screens.
$checkoutItems = [
    ['name' => 'ARISUN 225/75R15C-8PR WIN+ 116/114Q (ZX25)', 'code' => 'BULL-TBR0001', 'quantity' => 20, 'price' => 185000],
    ['name' => 'ARISUN 225/60R17PR 99H (ZP01) TL', 'code' => 'BULL-TBR0001', 'quantity' => 50, 'price' => 128097],
    ['name' => 'ARISUN 255/35ZR19 96W XL (ZS03)', 'code' => 'BULL-TBR0001', 'quantity' => 10, 'price' => 127920],
    ['name' => 'ARISUN 275/55R20 117V XL (ZG02)', 'code' => 'BULL-TBR0001', 'quantity' => 100, 'price' => 180752],
    ['name' => 'ARISUN 275/45R20 110V (ZG02)', 'code' => 'BULL-TBR0001', 'quantity' => 60, 'price' => 163904],
];
// Amounts are in satang to keep line totals and tax rounding consistent.
$checkoutSubtotal = array_sum(array_map(function ($item) {
    return $item['quantity'] * $item['price'];
}, $checkoutItems));
$checkoutDiscount = 0;
$checkoutVat = (int) round(($checkoutSubtotal - $checkoutDiscount) * 0.10);
$checkoutTotal = $checkoutSubtotal - $checkoutDiscount + $checkoutVat;
$checkoutMoney = function ($amount) {
    return number_format($amount / 100, 2) . ' บาท';
};
