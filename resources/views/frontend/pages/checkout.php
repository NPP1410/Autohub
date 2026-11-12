<?php
$pageName = 'checkout';
$pageTitle = 'Checkout';
require resource_path('views/frontend/partials/inc_checkout_order.php');
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>

<body>

    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>

    <main class="main-content">

        <!-- Topbar -->
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>

        <!-- Page Content -->
        <div class="page-content">

            <div class="checkout-page">

                <div class="row g-3 align-items-start">

                    <!-- ==========================
                         LEFT CONTENT
                    =========================== -->
                    <div class="col-12 col-xl-8">

                        <!-- ==========================
                             SHIPPING ADDRESS
                        =========================== -->
                        <section class="checkout-card checkout-address">

                            <div class="checkout-card__header">

                                <h2>Shipping Address</h2>

                                <button
                                    type="button"
                                    class="checkout-btn-edit">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </button>

                            </div>

                            <div class="row g-3">

                                <!-- First Name -->
                                <div class="col-12 col-md-6">
                                    <div class="checkout-field">
                                        <label for="firstName">First Name</label>
                                        <input
                                            type="text"
                                            id="firstName"
                                            class="checkout-field__control"
                                            value="Wade">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-12 col-md-6">
                                    <div class="checkout-field">
                                        <label for="lastName">Last Name</label>
                                        <input
                                            type="text"
                                            id="lastName"
                                            class="checkout-field__control"
                                            value="Warren">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-12 col-md-6">
                                    <div class="checkout-field">
                                        <label for="email">E-mail</label>
                                        <input
                                            type="email"
                                            id="email"
                                            class="checkout-field__control"
                                            value="wade.warren@example.com">
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-12 col-md-6">
                                    <div class="checkout-field">
                                        <label for="phoneNumber">Phone Number</label>

                                        <div class="checkout-phone">

                                            <input
                                                type="tel"
                                                id="phoneNumber"
                                                value="(66) 055-533-0120">

                                            <div class="checkout-phone__country">
                                                <span>🇹🇭</span>
                                                <i class="bi bi-caret-down-fill"></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <div class="checkout-field">
                                        <label for="shippingAddress">Address</label>
                                        <input
                                            type="text"
                                            id="shippingAddress"
                                            class="checkout-field__control"
                                            value="32/1 Charansanitwong Road">
                                    </div>
                                </div>

                                <!-- District -->
                                <div class="col-6 col-md-3">
                                    <div class="checkout-field">
                                        <label for="district">District</label>
                                        <input
                                            type="text"
                                            id="district"
                                            class="checkout-field__control"
                                            value="Bang Aor">
                                    </div>
                                </div>

                                <!-- Sub-district -->
                                <div class="col-6 col-md-3">
                                    <div class="checkout-field">
                                        <label for="subDistrict">Sub-district</label>
                                        <input
                                            type="text"
                                            id="subDistrict"
                                            class="checkout-field__control"
                                            value="Bang Plad">
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-6 col-md-3">
                                    <div class="checkout-field">
                                        <label for="city">City</label>
                                        <input
                                            type="text"
                                            id="city"
                                            class="checkout-field__control"
                                            value="Bangkok">
                                    </div>
                                </div>

                                <!-- Pin Code -->
                                <div class="col-6 col-md-3">
                                    <div class="checkout-field">
                                        <label for="pinCode">Pin Code</label>
                                        <input
                                            type="text"
                                            id="pinCode"
                                            class="checkout-field__control"
                                            value="10700">
                                    </div>
                                </div>

                            </div>

                            <div class="checkout-address__footer">

                                <button
                                    type="button"
                                    class="checkout-btn-add">
                                    <i class="bi bi-plus-lg"></i>
                                    Add New Address
                                </button>

                                <button
                                    type="button"
                                    class="checkout-btn-primary">
                                    Confirm
                                </button>

                            </div>

                        </section>

                        <!-- ==========================
                             SHIPPING
                        =========================== -->
                        <section class="checkout-card checkout-shipping">

                            <div class="checkout-card__header">
                                <h2>Shipping</h2>
                            </div>

                            <div class="checkout-field">

                                <select
                                    id="shippingMethod"
                                    class="checkout-field__control checkout-field__select">

                                    <option value="pickup" selected>
                                        จัดส่งสินค้า
                                    </option>

                                    <option value="delivery">
                                        รับสินค้าด้วยตนเอง
                                    </option>

                                </select>

                            </div>

                            <div class="checkout-shipping__details">

                                <h3>กรอกข้อมูลที่อยู่จัดส่งสินค้า</h3>

                                <div class="row g-3">

                                    <!-- Province -->
                                    <div class="col-12 col-md-6">
                                        <div class="checkout-field">
                                            <label for="deliveryProvince">
                                                เลือกจังหวัด
                                            </label>

                                            <input
                                                type="text"
                                                id="deliveryProvince"
                                                class="checkout-field__control"
                                                value="Bang Aor">
                                        </div>
                                    </div>

                                    <!-- Sub District -->
                                    <div class="col-12 col-md-6">
                                        <div class="checkout-field">
                                            <label for="deliverySubDistrict">
                                                Sub-district
                                            </label>

                                            <input
                                                type="text"
                                                id="deliverySubDistrict"
                                                class="checkout-field__control"
                                                value="Bang Plad">
                                        </div>
                                    </div>

                                    <!-- Delivery Address -->
                                    <div class="col-12">
                                        <div class="checkout-field">

                                            <label for="deliveryAddress">
                                                ที่อยู่
                                            </label>

                                            <textarea
                                                id="deliveryAddress"
                                                class="checkout-field__control checkout-field__textarea"
                                                rows="3">32/1 Charansanitwong Road</textarea>

                                        </div>
                                    </div>

                                </div>

                                <div class="checkout-shipping__footer">

                                    <button
                                        type="button"
                                        class="checkout-btn-primary">
                                        Confirm
                                    </button>

                                </div>

                            </div>

                        </section>

                        <!-- ==========================
                             PAYMENT METHOD
                        =========================== -->
                        <section class="checkout-card checkout-payment">

                            <div class="checkout-card__header">
                                <h2>Payment Method</h2>
                            </div>

                            <!-- Payment Options -->
                            <div class="checkout-payment__methods">

                                <label class="checkout-payment__option">

                                    <input
                                        type="radio"
                                        name="paymentMethod"
                                        value="bank">

                                    <span>ชำระเงินผ่านบัญชีธนาคาร</span>

                                </label>

                                <label class="checkout-payment__option">

                                    <input
                                        type="radio"
                                        name="paymentMethod"
                                        value="promptpay">

                                    <span>ชำระเงินผ่านพร้อมเพย์ Qr code</span>

                                </label>

                                <label class="checkout-payment__option">

                                    <input
                                        type="radio"
                                        name="paymentMethod"
                                        value="credit-card"
                                        checked>

                                    <span>Credit card</span>

                                    <div class="checkout-payment__brands">
                                        <span class="checkout-payment__brand">VISA</span>
                                        <span class="checkout-payment__brand">Mastercard</span>
                                        <span class="checkout-payment__brand">AMEX</span>
                                        <span class="checkout-payment__brand">DISCOVER</span>
                                    </div>

                                </label>

                            </div>

                            <!-- Credit Card Fields -->
                            <div class="checkout-payment__fields">

                                <div class="row g-3">

                                    <!-- Card Number -->
                                    <div class="col-12 col-md-6">
                                        <div class="checkout-field">

                                            <label for="cardNumber">
                                                Card Number
                                            </label>

                                            <input
                                                type="text"
                                                id="cardNumber"
                                                class="checkout-field__control"
                                                placeholder="xxxx xxxx xxxx xxxx"
                                                autocomplete="off">

                                        </div>
                                    </div>

                                    <!-- Name of Card -->
                                    <div class="col-12 col-md-6">
                                        <div class="checkout-field">

                                            <label for="cardName">
                                                Name of Card
                                            </label>

                                            <input
                                                type="text"
                                                id="cardName"
                                                class="checkout-field__control"
                                                value="Wade Warren">

                                        </div>
                                    </div>

                                    <!-- Country -->
                                    <div class="col-6 col-md-3">
                                        <div class="checkout-field">

                                            <label for="cardCountry">
                                                Country
                                            </label>

                                            <select
                                                id="cardCountry"
                                                class="checkout-field__control checkout-field__select">

                                                <option value="" selected>
                                                    Country
                                                </option>

                                                <option value="TH">
                                                    Thailand
                                                </option>

                                            </select>

                                        </div>
                                    </div>

                                    <!-- Zip Code -->
                                    <div class="col-6 col-md-3">
                                        <div class="checkout-field">

                                            <label for="cardZipCode">
                                                Zip Code
                                            </label>

                                            <input
                                                type="text"
                                                id="cardZipCode"
                                                class="checkout-field__control"
                                                value="1234">

                                        </div>
                                    </div>

                                    <!-- Exp Date -->
                                    <div class="col-6 col-md-3">
                                        <div class="checkout-field">

                                            <label for="cardExpDate">
                                                Exp Date
                                            </label>

                                            <input
                                                type="text"
                                                id="cardExpDate"
                                                class="checkout-field__control"
                                                placeholder="MM/YYYY"
                                                value="15/2026">

                                        </div>
                                    </div>

                                    <!-- CVV -->
                                    <div class="col-6 col-md-3">
                                        <div class="checkout-field">

                                            <label for="cardCvv">
                                                CVV
                                            </label>

                                            <input
                                                type="password"
                                                id="cardCvv"
                                                class="checkout-field__control"
                                                placeholder="CVV"
                                                autocomplete="off">

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="checkout-payment__footer">

                                <button
                                    type="button"
                                    class="checkout-btn-primary">
                                    Pay 7,856.73 บาท
                                </button>

                            </div>

                        </section>

                    </div>

                    <!-- ==========================
                         RIGHT CONTENT
                    =========================== -->
                    <div class="col-12 col-xl-4">

                        <aside class="checkout-card order-summary">

                            <div class="checkout-card__header">

                                <h2>Order Summary</h2>

                                <a href="cart.php"
                                    class="order-summary__edit"
                                    aria-label="Edit cart">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                            </div>

                            <div class="order-summary__list">
                                <?php foreach ($checkoutItems as $item): ?>
                                    <div class="order-summary__item">
                                        <div class="order-summary__image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ARISUN Tire">
                                        </div>
                                        <div class="order-summary__info">
                                            <h3><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                                            <p>Product Code : <?= htmlspecialchars($item['code'], ENT_QUOTES, 'UTF-8') ?></p>
                                            <p>Quantity : <?= $item['quantity'] ?></p>
                                        </div>
                                        <div class="order-summary__price">
                                            <?= $checkoutMoney($item['quantity'] * $item['price']) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Summary Amount -->
                            <div class="order-summary__amount">

                                <div class="order-summary__row">
                                    <span>Sub Total</span>
                                    <strong><?= $checkoutMoney($checkoutSubtotal) ?></strong>
                                </div>

                                <div class="order-summary__row">
                                    <span>Discount</span>
                                    <strong><?= $checkoutMoney($checkoutDiscount) ?></strong>
                                </div>

                                <div class="order-summary__row">
                                    <span>VAT (10%)</span>
                                    <strong><?= $checkoutMoney($checkoutVat) ?></strong>
                                </div>

                            </div>

                            <!-- Total -->
                            <div class="order-summary__total">

                                <span>Total :</span>

                                <strong><?= $checkoutMoney($checkoutTotal) ?></strong>

                            </div>

                            <a href="confirm.php" id="checkoutConfirm" class="checkout-confirm-button">
                                Confirm การสั่งซื้อ <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </a>

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
