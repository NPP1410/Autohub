<?php
$pageName = 'checkout';
$pageTitle = 'Checkout';
$_title = 'Confirm Order | Alpha Auto Company';
require resource_path('views/frontend/partials/inc_checkout_order.php');
$invoiceDate = new DateTimeImmutable('today', new DateTimeZone('Asia/Bangkok'));
$dueDate = $invoiceDate->modify('+30 days');
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="confirm-order-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="confirm-page">
                <div class="row g-3 align-items-start">
                    <div class="col-12 col-xl-8">
                        <section class="invoice-card" aria-labelledby="invoiceTitle">
                            <div class="invoice-heading">
                                <h1 id="invoiceTitle">Shopping Invoice : <span>#AH0001</span></h1>
                                <div class="invoice-actions">
                                    <a href="product.php" class="invoice-button invoice-button--publish">Publish Product</a>
                                    <button type="button" class="invoice-button" id="saveInvoicePdf">
                                        <i class="bi bi-floppy" aria-hidden="true"></i> Save As PDF
                                    </button>
                                </div>
                            </div>

                            <div class="invoice-addresses">
                                <section>
                                    <h2>Shipping Address :</h2>
                                    <p data-confirm="address">32/1 Charansanitwong Road<br>Bang Aor, Bang Plad, Bangkok<br>10700</p>
                                    <a class="invoice-phone" href="tel:+66555330120" data-confirm="phone">(66) 055-533-0120</a>
                                </section>
                                <section>
                                    <h2>Shipping Methods :</h2>
                                    <p><strong data-confirm="shippingMethod">จัดส่งสินค้า</strong><br><span data-confirm="deliveryAddress">32/1 Charansanitwong Road<br>Bang Aor, Bang Plad, Bangkok<br>10700</span></p>
                                </section>
                            </div>

                            <dl class="invoice-meta">
                                <div><dt>Invoice ID :</dt><dd>#AH0001</dd></div>
                                <div><dt>Date Issued :</dt><dd><?= $invoiceDate->format('d,M Y') ?></dd></div>
                                <div><dt>Due Amount :</dt><dd><?= $checkoutMoney($checkoutTotal) ?></dd></div>
                            </dl>

                            <div class="invoice-table-wrap" role="region" aria-label="รายการสินค้า" tabindex="0">
                                <table class="invoice-table">
                                    <thead><tr><th scope="col">Product</th><th scope="col">Quantity</th><th scope="col">Price Per Unit</th><th scope="col">Total</th></tr></thead>
                                    <tbody>
                                        <?php foreach ($checkoutItems as $item): ?>
                                        <tr>
                                            <td><span><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></span><small>Product Code : <?= htmlspecialchars($item['code'], ENT_QUOTES, 'UTF-8') ?></small></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td><?= $checkoutMoney($item['price']) ?></td>
                                            <td><?= $checkoutMoney($item['quantity'] * $item['price']) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <dl class="invoice-totals">
                                <div><dt>Sub Total :</dt><dd><?= $checkoutMoney($checkoutSubtotal) ?></dd></div>
                                <div><dt>Avail Discount :</dt><dd><?= $checkoutMoney($checkoutDiscount) ?></dd></div>
                                <div><dt>Vat <span>(10%)</span> :</dt><dd><?= $checkoutMoney($checkoutVat) ?></dd></div>
                                <div class="invoice-grand-total"><dt>Total :</dt><dd><?= $checkoutMoney($checkoutTotal) ?></dd></div>
                            </dl>

                            <div class="invoice-note">
                                <h2>Note:</h2>
                                <p>เมื่อทีมงานฝ่ายบัญชีเจ้าหนี้ตรวจสอบและบันทึกข้อมูลในใบแจ้งหนี้เรียบร้อยแล้ว ขั้นตอนสุดท้ายคือการส่งใบแจ้งหนี้<br class="d-none d-lg-block">ไปขออนุมัติก่อนที่จะดำเนินการชำระเงิน</p>
                            </div>
                        </section>
                        <a href="checkout.php" class="invoice-back"><i class="bi bi-arrow-left" aria-hidden="true"></i> กลับไปแก้ไข Checkout</a>
                    </div>

                    <div class="col-12 col-xl-4">
                        <aside class="invoice-card invoice-payment" aria-labelledby="paymentTitle">
                            <h2 id="paymentTitle">Mode Of Payment</h2>
                            <h3 data-confirm="paymentMethod">Credit/Debit Card</h3>
                            <dl>
                                <div data-card-detail><dt>Name On Card :</dt><dd data-confirm="cardName">Wade Warren</dd></div>
                                <div data-card-detail><dt>Card Number :</dt><dd data-confirm="cardNumber">ยังไม่ได้ระบุ</dd></div>
                                <div><dt>Total Amount :</dt><dd class="invoice-payment-total"><?= $checkoutMoney($checkoutTotal) ?></dd></div>
                                <div><dt>Due Date :</dt><dd><?= $dueDate->format('d,M Y') ?></dd></div>
                            </dl>
                            <p class="invoice-payment-notice">กรุณาชำระเงินตามใบแจ้งหนี้ภายใน 30 วัน</p>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
    <script src="<?= htmlspecialchars(asset('frontend-assets/js/checkout-confirm.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
</body>
</html>
