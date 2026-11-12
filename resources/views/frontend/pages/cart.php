<?php $pageName = 'cart'; ?>

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

            <div class="cart-page">

                <!-- ====================================
                     DASHBOARD STATISTICS
                ===================================== -->
                <div class="row g-3 cart-stats">

                    <!-- Total Orders -->
                    <div class="col-12 col-md-6 col-xl-4">

                        <div class="stat-card">

                            <div class="stat-card__top">
                                <h3>Total Orders</h3>

                                <button type="button"
                                    class="stat-card__menu"
                                    aria-label="More options">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                            </div>

                            <p class="stat-card__period">
                                Last 7 days
                            </p>

                            <div class="stat-card__numbers">
                                <strong>10.7K</strong>
                                <span>order</span>

                                <span class="stat-card__growth">
                                    <i class="bi bi-arrow-up"></i>
                                    14.4%
                                </span>
                            </div>

                            <div class="stat-card__bottom">
                                <span>Previous 7days</span>

                                <a href="#" class="stat-card__details">
                                    Details
                                </a>
                            </div>

                        </div>

                    </div>

                    <!-- Customer Claim -->
                    <div class="col-12 col-md-6 col-xl-4">

                        <div class="stat-card">

                            <div class="stat-card__top">
                                <h3>Customer Claim</h3>

                                <button type="button"
                                    class="stat-card__menu"
                                    aria-label="More options">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                            </div>

                            <p class="stat-card__period">
                                Last 7 days
                            </p>

                            <div class="stat-card__numbers">
                                <strong>5</strong>
                                <span>Claim</span>
                            </div>

                            <div class="stat-card__bottom">
                                <span>Previous 7days</span>

                                <a href="#" class="stat-card__details">
                                    Details
                                </a>
                            </div>

                        </div>

                    </div>

                    <!-- Reward Points -->
                    <div class="col-12 col-md-12 col-xl-4">

                        <div class="stat-card">

                            <div class="stat-card__top">
                                <h3>Reward points</h3>

                                <button type="button"
                                    class="stat-card__menu"
                                    aria-label="More options">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                            </div>

                            <p class="stat-card__period">
                                Last 7 days
                            </p>

                            <div class="stat-card__numbers">
                                <strong>500</strong>
                                <span>Points</span>

                                <span class="stat-card__growth">
                                    <i class="bi bi-arrow-up"></i>
                                    10.4%
                                </span>
                            </div>

                            <div class="stat-card__bottom">
                                <span>Previous 7days</span>

                                <a href="#" class="stat-card__details">
                                    Details
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- ====================================
                     SHOPPING CART
                ===================================== -->
                <section class="shopping-cart">

                    <!-- Cart Header -->
                    <div class="shopping-cart__header">

                        <h1>
                            Shopping Cart
                            (<span id="cartItemCount">5</span> Items)
                        </h1>

                        <div class="shopping-cart__actions">

                            <a href="product.php"
                                class="cart-btn cart-btn--outline">
                                Continue Shopping
                            </a>

                            <a href="checkout.php"
                                class="cart-btn cart-btn--checkout">
                                Checkout
                            </a>

                        </div>

                    </div>

                    <!-- Table Header -->
                    <div class="shopping-cart__table-head">

                        <span>PRODUCT</span>
                        <span>QUANTITY</span>
                        <span>PRICE</span>
                        <span></span>

                    </div>

                    <!-- Cart Items -->
                    <div class="shopping-cart__items" id="cartItems">

                        <!-- Product 1 -->
                        <article class="cart-item" data-cart-item>

                            <div class="cart-item__product">

                                <a href="product-detail.php"
                                    class="cart-item__image">

                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                        alt="ARISUN 225/75R15C">

                                </a>

                                <div class="cart-item__info">

                                    <a href="product-detail.php"
                                        class="cart-item__name">
                                        ARISUN 225/75R15C-8PR WIN+ 116/114Q (ZX25)
                                    </a>

                                    <p>Product Code : BULL-TBR0001</p>

                                </div>

                            </div>

                            <div class="cart-item__quantity">

                                <div class="cart-quantity">

                                    <button type="button"
                                        data-qty-plus
                                        aria-label="เพิ่มจำนวน">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                    <input type="number"
                                        value="1"
                                        min="1"
                                        max="9999"
                                        aria-label="จำนวนสินค้า">

                                    <button type="button"
                                        data-qty-minus
                                        aria-label="ลดจำนวน">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>

                                </div>

                            </div>

                            <div class="cart-item__price">
                                1,850.00 บาท
                            </div>

                            <div class="cart-item__remove">

                                <button type="button"
                                    data-remove-item
                                    aria-label="ลบสินค้า">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                        </article>

                        <!-- Product 2 -->
                        <article class="cart-item" data-cart-item>

                            <div class="cart-item__product">

                                <a href="product-detail.php"
                                    class="cart-item__image">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                        alt="ARISUN 225/60R17PR">
                                </a>

                                <div class="cart-item__info">

                                    <a href="product-detail.php"
                                        class="cart-item__name">
                                        ARISUN 225/60R17PR 99H (ZP01) TL
                                    </a>

                                    <p>Product Code : BULL-TBR0001</p>

                                </div>

                            </div>

                            <div class="cart-item__quantity">

                                <div class="cart-quantity">

                                    <button type="button"
                                        data-qty-plus
                                        aria-label="เพิ่มจำนวน">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                    <input type="number"
                                        value="1"
                                        min="1"
                                        max="9999"
                                        aria-label="จำนวนสินค้า">

                                    <button type="button"
                                        data-qty-minus
                                        aria-label="ลดจำนวน">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>

                                </div>

                            </div>

                            <div class="cart-item__price">
                                1,280.97 บาท
                            </div>

                            <div class="cart-item__remove">

                                <button type="button"
                                    data-remove-item
                                    aria-label="ลบสินค้า">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                        </article>

                        <!-- Product 3 -->
                        <article class="cart-item" data-cart-item>

                            <div class="cart-item__product">

                                <a href="product-detail.php"
                                    class="cart-item__image">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                        alt="ARISUN 255/35ZR19">
                                </a>

                                <div class="cart-item__info">

                                    <a href="product-detail.php"
                                        class="cart-item__name">
                                        ARISUN 255/35ZR19 96W XL (ZS03)
                                    </a>

                                    <p>Product Code : BULL-TBR0001</p>

                                </div>

                            </div>

                            <div class="cart-item__quantity">

                                <div class="cart-quantity">

                                    <button type="button"
                                        data-qty-plus
                                        aria-label="เพิ่มจำนวน">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                    <input type="number"
                                        value="1"
                                        min="1"
                                        max="9999"
                                        aria-label="จำนวนสินค้า">

                                    <button type="button"
                                        data-qty-minus
                                        aria-label="ลดจำนวน">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>

                                </div>

                            </div>

                            <div class="cart-item__price">
                                1,279.20 บาท
                            </div>

                            <div class="cart-item__remove">

                                <button type="button"
                                    data-remove-item
                                    aria-label="ลบสินค้า">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                        </article>

                        <!-- Product 4 -->
                        <article class="cart-item" data-cart-item>

                            <div class="cart-item__product">

                                <a href="product-detail.php"
                                    class="cart-item__image">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                        alt="ARISUN 275/55R20">
                                </a>

                                <div class="cart-item__info">

                                    <a href="product-detail.php"
                                        class="cart-item__name">
                                        ARISUN 275/55R20 117V XL (ZG02)
                                    </a>

                                    <p>Product Code : BULL-TBR0001</p>

                                </div>

                            </div>

                            <div class="cart-item__quantity">

                                <div class="cart-quantity">

                                    <button type="button"
                                        data-qty-plus
                                        aria-label="เพิ่มจำนวน">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                    <input type="number"
                                        value="1"
                                        min="1"
                                        max="9999"
                                        aria-label="จำนวนสินค้า">

                                    <button type="button"
                                        data-qty-minus
                                        aria-label="ลดจำนวน">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>

                                </div>

                            </div>

                            <div class="cart-item__price">
                                1,807.52 บาท
                            </div>

                            <div class="cart-item__remove">

                                <button type="button"
                                    data-remove-item
                                    aria-label="ลบสินค้า">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                        </article>

                        <!-- Product 5 -->
                        <article class="cart-item" data-cart-item>

                            <div class="cart-item__product">

                                <a href="product-detail.php"
                                    class="cart-item__image">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                        alt="ARISUN 275/45R20">
                                </a>

                                <div class="cart-item__info">

                                    <a href="product-detail.php"
                                        class="cart-item__name">
                                        ARISUN 275/45R20 110V (ZG02)
                                    </a>

                                    <p>Product Code : BULL-TBR0001</p>

                                </div>

                            </div>

                            <div class="cart-item__quantity">

                                <div class="cart-quantity">

                                    <button type="button"
                                        data-qty-plus
                                        aria-label="เพิ่มจำนวน">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                    <input type="number"
                                        value="1"
                                        min="1"
                                        max="9999"
                                        aria-label="จำนวนสินค้า">

                                    <button type="button"
                                        data-qty-minus
                                        aria-label="ลดจำนวน">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>

                                </div>

                            </div>

                            <div class="cart-item__price">
                                1,639.04 บาท
                            </div>

                            <div class="cart-item__remove">

                                <button type="button"
                                    data-remove-item
                                    aria-label="ลบสินค้า">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                        </article>

                    </div>

                    <!-- Empty Cart Message -->
                    <p class="shopping-cart__empty"
                        id="cartEmptyMessage"
                        hidden>
                        ไม่มีสินค้าในตะกร้า
                    </p>

                    <!-- Cart Footer -->
                    <div class="shopping-cart__footer">

                        <div class="shopping-cart__actions">

                            <a href="product.php"
                                class="cart-btn cart-btn--outline">
                                Continue Shopping
                            </a>

                            <a href="checkout.php"
                                class="cart-btn cart-btn--checkout">
                                Checkout
                            </a>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </main>

    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

</body>

</html>