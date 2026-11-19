<?php require resource_path('views/frontend/partials/sweetalert.php'); ?>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/jquery.min.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/bootstrap.bundle.min.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/jquery-ui.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/modernizr.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/wow.min.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/owl.carousel.min.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="<?= htmlspecialchars(asset('frontend-assets/js/jquery.fancybox.min.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->



 <script>
 	$(document).ready(function() {
 		var currentPage = <?php echo json_encode($pageName ?? ''); ?>;
        currentPage = ({index: 'dashboard', 'promotion-detail': 'promotion'})[currentPage] || currentPage;

 		$('.menu-link[data-page]').each(function() {
 			var menuPage = $(this).attr('data-page');

 			$(this).toggleClass('active', currentPage === menuPage);
 		});
 	});
 </script>


 <script>
 	$(document).ready(function() {

 		wow = new WOW({
 			animateClass: 'animated',
 			offset: 100
 		});
 		wow.init();

 	});
 </script>


 <script type="text/javascript">
 	$(document).ready(function() {
 		$('.owl-bannerSlide').owlCarousel({
 			loop: true,
 			margin: 0,
 			autoplay: true,
 			autoplayTimeout: 8000,
 			autoplayHoverPause: true,
 			smartSpeed: 2000,
 			nav: false,
 			dots: false,
 			navText: ['&nbsp;', '&nbsp;'],
 			responsive: {
 				0: {
 					items: 1
 				},
 				768: {
 					items: 1
 				},
 				1000: {
 					items: 1
 				}
 			}
 		});
 	});


     (function () {
        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('sidebarOverlay');
        const closeButton = document.getElementById('sidebarClose');
        if (!sidebar || !toggle || !overlay) return;

        const compactLayout = window.matchMedia('(max-width: 1199.98px)');

        function setOpen(open, restoreFocus = true) {
            const isOpen = compactLayout.matches && open;
            sidebar.classList.toggle('show', isOpen);
            overlay.classList.toggle('show', isOpen);
            document.body.classList.toggle('sidebar-open', isOpen);
            toggle.setAttribute('aria-expanded', String(isOpen));
            toggle.setAttribute('aria-label', isOpen ? 'ปิดเมนู' : 'เปิดเมนู');
            sidebar.inert = compactLayout.matches && !isOpen;
            sidebar.setAttribute('aria-hidden', String(compactLayout.matches && !isOpen));
            if (isOpen) {
                (closeButton || sidebar.querySelector('a, button'))?.focus({ preventScroll: true });
            } else if (restoreFocus && compactLayout.matches) {
                toggle.focus({ preventScroll: true });
            }
        }

        toggle.addEventListener('click', function () { setOpen(!sidebar.classList.contains('show')); });
        overlay.addEventListener('click', function () { setOpen(false); });
        closeButton?.addEventListener('click', function () { setOpen(false); });
        compactLayout.addEventListener('change', function () {
            setOpen(false, sidebar.contains(document.activeElement));
        });

        document.addEventListener('keydown', function (event) {
            if (!compactLayout.matches || !sidebar.classList.contains('show')) return;
            if (event.key === 'Escape') {
                event.preventDefault();
                setOpen(false);
                return;
            }
            if (event.key !== 'Tab') return;
            const focusable = Array.from(sidebar.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), [tabindex="0"]'))
                .filter(function (element) { return element.getClientRects().length > 0; });
            const first = focusable[0];
            const last = focusable[focusable.length - 1];
            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault(); last?.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault(); first?.focus();
            }
        });

        sidebar.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (compactLayout.matches && link.getAttribute('href') !== '#') setOpen(false, false);
            });
        });
        sidebar.querySelectorAll('.submenu-link').forEach(function (link) {
            link.addEventListener('click', function () {
                sidebar.querySelectorAll('.submenu-link').forEach(function (item) { item.classList.remove('active'); });
                link.classList.add('active');
            });
        });
        setOpen(false, false);
    })();

	document.addEventListener('DOMContentLoaded', function() {

 		const viewButtons = document.querySelectorAll(
 			'.product-listing__view'
 		);

 		const productGrid = document.querySelector(
 			'.product-listing__grid'
 		);

 		if (!productGrid) return;

 		viewButtons.forEach(function(button) {

 			button.addEventListener('click', function() {

 				const view = this.dataset.view;

 				viewButtons.forEach(function(btn) {
 					btn.classList.remove('active');
 					btn.setAttribute('aria-pressed', 'false');
 				});

 				this.classList.add('active');
 				this.setAttribute('aria-pressed', 'true');

 				if (view === 'list') {
 					productGrid.classList.add('is-list');
 				} else {
 					productGrid.classList.remove('is-list');
 				}

 			});

 		});

 	});
 </script>

 <script>
 	document.addEventListener('DOMContentLoaded', function() {

 		// ========================================
 		// 1. DEMO PRODUCT CATALOG
 		// Replace with API / Database later
 		// ========================================

 		const catalog = [{
 				id: 1,
 				orderId: 'BULL-TBR0001',
 				brand: 'ARISUN',
 				name: 'ARISUN 225/75R15C-8PR WIN+ 116/114Q (ZX25)',
 				tireSize: '225/75R15C',
 				category: 'tire',
 				price: 13350,
 				oldPrice: 14000,
 				image: 'images/product-01.jpg'
 			},
 			{
 				id: 2,
 				orderId: 'BULL-TBR0002',
 				brand: 'ARISUN',
 				name: 'ARISUN Pilot Sport EV 255/45 R19',
 				tireSize: '255/45R19',
 				category: 'tire',
 				price: 15350,
 				oldPrice: 18000,
 				image: 'images/product-01.jpg'
 			},
 			{
 				id: 3,
 				orderId: 'BULL-TBR0003',
 				brand: 'OTANI',
 				name: 'OTANI KN1000 215/50R19',
 				tireSize: '215/50R19',
 				category: 'tire',
 				price: 8350,
 				oldPrice: 10000,
 				image: 'images/product-01.jpg'
 			},
 			{
 				id: 4,
 				orderId: 'BULL-EVC0001',
 				brand: 'AUTO HUB',
 				name: 'EV Portable Charger 3.5kW',
 				tireSize: '',
 				category: 'charger',
 				price: 6350,
 				oldPrice: 7500,
 				image: 'images/product-02.jpg'
 			},
 			{
 				id: 5,
 				orderId: 'BULL-EVC0002',
 				brand: 'AUTO HUB',
 				name: 'EV Wall Charger 7kW',
 				tireSize: '',
 				category: 'charger',
 				price: 13500,
 				oldPrice: 16000,
 				image: 'images/product-02.jpg'
 			}
 		];


 		// ========================================
 		// 2. STATE
 		// ========================================

 		let searchProducts = [];
 		let orderProducts = [];

 		const searchForm = document.getElementById(
 			'advancedProductSearchForm'
 		);

 		const searchSection = document.getElementById(
 			'orderSearchSection'
 		);

 		const searchResults = document.getElementById(
 			'orderSearchResults'
 		);

 		const searchResultCount = document.getElementById(
 			'searchResultCount'
 		);

 		const tableBody = document.getElementById(
 			'productTableBody'
 		);

 		const totalQuantity = document.getElementById(
 			'totalQuantity'
 		);

 		const grandTotal = document.getElementById(
 			'grandTotal'
 		);

 		const orderItemCount = document.getElementById(
 			'orderItemCount'
 		);

 		const submitOrderBtn = document.getElementById(
 			'submitOrderBtn'
 		);

 		if (!searchForm || !searchResults || !tableBody) return;


 		// ========================================
 		// 3. HELPERS
 		// ========================================

 		const formatPrice = value =>
 			Number(value).toLocaleString('en-US');

 		const escapeHTML = value =>
 			String(value ?? '').replace(/[&<>"']/g, char => ({
 				'&': '&amp;',
 				'<': '&lt;',
 				'>': '&gt;',
 				'"': '&quot;',
 				"'": '&#39;'
 			})[char]);

 		function normalize(value) {
 			return String(value ?? '')
 				.toLowerCase()
 				.replace(/\s+/g, '');
 		}

 		function getFilters() {
 			return {
 				category: document.getElementById('filterCategory')?.value || '',
 				brand: document.getElementById('filterBrand')?.value || '',
 				tireSize: document.getElementById('filterTireSize')?.value.trim() || '',
 				productCode: document.getElementById('filterProductCode')?.value.trim() || ''
 			};
 		}

 		function validQuantity(value) {
 			const number = Number(value);

 			return Number.isSafeInteger(number) &&
 				number > 0 &&
 				number <= 9999;
 		}


 		// ========================================
 		// 4. SEARCH PRODUCTS
 		// ========================================

 		searchForm.addEventListener('submit', function(event) {

 			event.preventDefault();

 			const filters = getFilters();

 			const hasFilter = Object.values(filters).some(
 				value => value !== ''
 			);

 			// Prevent showing the entire catalog accidentally
 			if (!hasFilter) {
 				searchProducts = [];
 				searchSection.hidden = false;
 				searchResults.innerHTML = `
                <div class="col-12">
                    <div class="order-search-results__empty">
                        กรุณาระบุเงื่อนไขค้นหาสินค้าอย่างน้อย 1 ช่อง
                    </div>
                </div>
            `;
 				searchResultCount.textContent = 'กรุณาระบุเงื่อนไข';
 				return;
 			}

 			searchProducts = catalog.filter(product => {

 				const matchCategory = !filters.category ||
 					product.category === filters.category;

 				const matchBrand = !filters.brand ||
 					normalize(product.brand) === normalize(filters.brand);

 				const matchSize = !filters.tireSize ||
 					normalize(product.tireSize).includes(
 						normalize(filters.tireSize)
 					);

 				const matchCode = !filters.productCode ||
 					normalize(product.orderId).includes(
 						normalize(filters.productCode)
 					);

 				return (
 					matchCategory &&
 					matchBrand &&
 					matchSize &&
 					matchCode
 				);

 			});

 			renderSearchResults();

 		});


 		// ========================================
 		// 5. RENDER SEARCH RESULTS
 		// ========================================

 		function renderSearchResults() {

 			searchSection.hidden = false;

 			searchResultCount.textContent =
 				`พบสินค้า ${searchProducts.length} รายการ`;

 			if (!searchProducts.length) {

 				searchResults.innerHTML = `
                <div class="col-12">
                    <div class="order-search-results__empty">
                        <i class="bi bi-search"></i>
                        <p>ไม่พบสินค้าที่ตรงกับการค้นหา</p>
                    </div>
                </div>
            `;

 				return;
 			}

 			searchResults.innerHTML = searchProducts.map(product => {

 				const selected = orderProducts.find(
 					item => item.id === product.id
 				);

 				return `
                <div class="col-12 col-md-6 col-xl-4">

                    <div class="order-product-card">

                        <div class="order-product-card__top">

                            <img
                                src="${escapeHTML(product.image)}"
                                alt="${escapeHTML(product.name)}">

                            <div class="order-product-card__info">

                                <span class="brand">
                                    ${escapeHTML(product.brand)}
                                </span>

                                <h5>${escapeHTML(product.name)}</h5>

                                <small>
                                    รหัส: ${escapeHTML(product.orderId)}
                                </small>

                                ${product.tireSize ? `
                                    <small>
                                        ขนาด: ${escapeHTML(product.tireSize)}
                                    </small>
                                ` : ''}

                            </div>

                        </div>

                        <div class="order-product-card__bottom">

                            <div class="price">
                                ${formatPrice(product.price)} บาท
                            </div>

                            <div class="order-product-card__actions">

                                <div class="quantity-control">

                                    <button type="button"
                                            class="js-qty-minus"
                                            data-product-id="${product.id}">
                                        <i class="bi bi-dash"></i>
                                    </button>

                                    <input
                                        type="number"
                                        class="js-search-qty"
                                        data-product-id="${product.id}"
                                        value="1"
                                        min="1"
                                        max="9999"
                                        step="1"
                                        aria-label="จำนวนสินค้า">

                                    <button type="button"
                                            class="js-qty-plus"
                                            data-product-id="${product.id}">
                                        <i class="bi bi-plus"></i>
                                    </button>

                                </div>

                                <button type="button"
                                        class="btn-add-product js-add-product"
                                        data-product-id="${product.id}">

                                    <i class="bi bi-plus-lg"></i>
                                    Add

                                </button>

                            </div>

                            ${selected ? `
                                <small class="text-success">
                                    มีในรายการสั่งซื้อแล้ว ${selected.quantity} ชิ้น
                                </small>
                            ` : ''}

                        </div>

                    </div>

                </div>
            `;

 			}).join('');
 		}


 		// ========================================
 		// 6. SEARCH RESULT ACTIONS
 		// ========================================

 		searchResults.addEventListener('click', function(event) {

 			const button = event.target.closest('button');

 			if (!button) return;

 			const productId = Number(button.dataset.productId);

 			if (!productId) return;

 			const qtyInput = Array.from(
 				searchResults.querySelectorAll('.js-search-qty')
 			).find(input => Number(input.dataset.productId) === productId);

 			if (!qtyInput) return;

 			let quantity = Number(qtyInput.value);

 			// Minus
 			if (button.classList.contains('js-qty-minus')) {
 				qtyInput.value = Math.max(
 					1,
 					validQuantity(quantity) ? quantity - 1 : 1
 				);
 				return;
 			}

 			// Plus
 			if (button.classList.contains('js-qty-plus')) {
 				qtyInput.value = Math.min(
 					9999,
 					validQuantity(quantity) ? quantity + 1 : 1
 				);
 				return;
 			}

 			// Add product
 			if (button.classList.contains('js-add-product')) {

 				if (!validQuantity(quantity)) {
					frontendAlert('กรุณาระบุจำนวนสินค้า 1 - 9999 ชิ้น');
 					qtyInput.focus();
 					return;
 				}

 				const product = catalog.find(
 					item => item.id === productId
 				);

 				if (!product) return;

 				const existing = orderProducts.find(
 					item => item.id === productId
 				);

 				if (existing) {

 					if (!validQuantity(existing.quantity + quantity)) {
						frontendAlert('จำนวนสินค้ารวมต้องไม่เกิน 9999 ชิ้น');
 						return;
 					}

 					existing.quantity += quantity;

 				} else {

 					orderProducts.push({
 						...product,
 						quantity: quantity
 					});

 				}

 				renderOrderTable();
 				renderSearchResults();

 				qtyInput.value = 1;
 			}

 		});


 		// ========================================
 		// 7. RENDER ORDER TABLE
 		// ========================================

 		function renderOrderTable() {

 			if (!orderProducts.length) {

 				tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="bi bi-cart3 d-block fs-2 mb-2"></i>
                        ยังไม่มีสินค้าในรายการสั่งซื้อ
                        <div class="small mt-1">
                            ค้นหาสินค้าและกด Add เพื่อเพิ่มรายการ
                        </div>
                    </td>
                </tr>
            `;

 			} else {

 				tableBody.innerHTML = orderProducts.map(product => `

                <tr>

                    <td>
                        ${escapeHTML(product.orderId)}
                    </td>

                    <td>
                        <strong class="product-table__brand">
                            ${escapeHTML(product.brand)}
                        </strong>
                    </td>

                    <td>
                        <div class="product-table__product">

                            <img
                                src="${escapeHTML(product.image)}"
                                alt="${escapeHTML(product.name)}">

                            <span>
                                ${escapeHTML(product.name)}
                            </span>

                        </div>
                    </td>

                    <td>
                        <span class="product-table__price">
                            ${formatPrice(product.price)}
                        </span>
                    </td>

                    <td>
                        <input
                            type="number"
                            class="form-control order-table-qty js-order-qty"
                            data-product-id="${product.id}"
                            value="${product.quantity}"
                            min="1"
                            max="9999"
                            step="1">
                    </td>

                    <td>
                        <strong class="order-line-total">
                            ${formatPrice(product.price * product.quantity)}
                        </strong>
                    </td>

                    <td>
                        <button
                            type="button"
                            class="btn-remove-product js-remove-product"
                            data-product-id="${product.id}"
                            aria-label="ลบสินค้า">

                            <i class="bi bi-trash"></i>

                        </button>
                    </td>

                </tr>

            `).join('');
 			}

 			updateSummary();
 		}


 		// ========================================
 		// 8. UPDATE QUANTITY IN ORDER TABLE
 		// ========================================

 		tableBody.addEventListener('change', function(event) {

 			const input = event.target.closest('.js-order-qty');

 			if (!input) return;

 			const productId = Number(input.dataset.productId);
 			const quantity = Number(input.value);

 			const product = orderProducts.find(
 				item => item.id === productId
 			);

 			if (!product) return;

 			if (!validQuantity(quantity)) {
				frontendAlert('กรุณาระบุจำนวนสินค้า 1 - 9999 ชิ้น');
 				input.value = product.quantity;
 				return;
 			}

 			product.quantity = quantity;

 			renderOrderTable();
 			if (!searchSection.hidden) renderSearchResults();

 		});


 		// ========================================
 		// 9. REMOVE PRODUCT
 		// ========================================

 		tableBody.addEventListener('click', function(event) {

 			const button = event.target.closest('.js-remove-product');

 			if (!button) return;

 			const productId = Number(button.dataset.productId);

 			orderProducts = orderProducts.filter(
 				item => item.id !== productId
 			);

 			renderOrderTable();
 			if (!searchSection.hidden) renderSearchResults();

 		});


 		// ========================================
 		// 10. UPDATE ORDER SUMMARY
 		// ========================================

 		function updateSummary() {

 			const totalItems = orderProducts.reduce(
 				(sum, product) => sum + product.quantity,
 				0
 			);

 			const totalPrice = orderProducts.reduce(
 				(sum, product) =>
 				sum + (product.price * product.quantity),
 				0
 			);

 			totalQuantity.textContent = formatPrice(totalItems);
 			grandTotal.textContent = formatPrice(totalPrice) + ' บาท';

 			orderItemCount.textContent =
 				`${orderProducts.length} รายการ`;

 			if (submitOrderBtn) {
 				submitOrderBtn.disabled = orderProducts.length === 0;
 			}
 		}


 		// ========================================
 		// 11. RESET SEARCH
 		// ========================================

 		searchForm.addEventListener('reset', function() {

 			searchProducts = [];
 			searchSection.hidden = true;
 			searchResults.innerHTML = '';
 			searchResultCount.textContent = 'พบสินค้า 0 รายการ';

 			// Important:
 			// Do not clear orderProducts.
 			// Previously selected order items remain.
 		});


 		// ========================================
 		// 12. SUBMIT ORDER (DEMO ONLY)
 		// ========================================

 		if (submitOrderBtn) {

 			submitOrderBtn.addEventListener('click', function() {

 				if (!orderProducts.length) return;

 				// Prepare data for backend integration
 				const orderPayload = {
 					items: orderProducts.map(product => ({
 						product_id: product.id,
 						product_code: product.orderId,
 						quantity: product.quantity
 					}))
 				};

 				console.log('Order payload:', orderPayload);

 				// TODO: Connect to PHP API
 				// POST orderPayload to the server.
 				// Server must validate stock and recalculate prices.

				frontendAlert(
 					'เตรียมรายการสั่งซื้อเรียบร้อยแล้ว ' +
 					'(Demo: ยังไม่ได้บันทึกลงระบบ)'
 				);

 			});

 		}


 		// ========================================
 		// 13. INITIAL STATE
 		// ========================================

 		searchSection.hidden = true;
 		renderOrderTable();

 	});
 </script>

 <script>
 	document.addEventListener('DOMContentLoaded', function() {

 		// ====================================
 		// PRODUCT GALLERY
 		// ====================================

 		const mainImage = document.getElementById('mainProductImage');
 		const thumbnails = document.querySelectorAll('.product-gallery__thumb');

 		if (mainImage && thumbnails.length) {

 			thumbnails.forEach(button => {

 				button.addEventListener('click', function() {

 					const image = this.dataset.image;

 					if (!image) return;

 					mainImage.src = image;

 					thumbnails.forEach(item => {
 						item.classList.remove('active');
 					});

 					this.classList.add('active');

 				});

 			});

 		}


 		// ====================================
 		// PRODUCT QUANTITY
 		// ====================================

 		const qtyInput = document.getElementById('productQuantity');
 		const qtyMinus = document.getElementById('qtyMinus');
 		const qtyPlus = document.getElementById('qtyPlus');

 		if (qtyInput) {

 			const minQty = Number(qtyInput.min) || 1;
 			const maxQty = Number(qtyInput.max) || 9999;

 			const normalizeQty = value => {

 				const number = Number(value);

 				if (!Number.isInteger(number)) {
 					return minQty;
 				}

 				return Math.min(
 					maxQty,
 					Math.max(minQty, number)
 				);

 			};

 			if (qtyMinus) {

 				qtyMinus.addEventListener('click', function() {

 					qtyInput.value = Math.max(
 						minQty,
 						normalizeQty(qtyInput.value) - 1
 					);

 				});

 			}

 			if (qtyPlus) {

 				qtyPlus.addEventListener('click', function() {

 					qtyInput.value = Math.min(
 						maxQty,
 						normalizeQty(qtyInput.value) + 1
 					);

 				});

 			}

 			qtyInput.addEventListener('change', function() {

 				qtyInput.value = normalizeQty(this.value);

 			});

 		}


 		// ====================================
 		// NEW PRODUCT SEARCH
 		// ====================================

 		const searchInput = document.getElementById('newProductSearch');
 		const productItems = document.querySelectorAll('.new-products__item');
 		const emptyMessage = document.getElementById('newProductsEmpty');

 		if (searchInput && productItems.length) {

 			searchInput.addEventListener('input', function() {

 				const keyword = this.value.trim().toLowerCase();

 				let visibleCount = 0;

 				productItems.forEach(item => {

 					// Search from HTML content directly
 					const productName = item.querySelector('.new-products__info h4');
 					const productSize = item.querySelector('.new-products__info p');

 					const searchText = [
 						productName?.textContent || '',
 						productSize?.textContent || ''
 					].join(' ').toLowerCase();

 					const matched = searchText.includes(keyword);

 					item.hidden = !matched;

 					if (matched) {
 						visibleCount++;
 					}

 				});

 				if (emptyMessage) {
 					emptyMessage.hidden = visibleCount > 0;
 				}

 			});

 		}

 	});
 </script>

 <script>

document.addEventListener('DOMContentLoaded', function () {

    // ====================================
    // CART ELEMENTS
    // ====================================

    const cartItems = document.getElementById('cartItems');
    const cartItemCount = document.getElementById('cartItemCount');
    const cartEmptyMessage = document.getElementById('cartEmptyMessage');

    if (!cartItems) return;


    // ====================================
    // UPDATE CART ITEM COUNT
    // ====================================

    function updateCartCount() {

        const totalItems = cartItems.querySelectorAll(
            '[data-cart-item]'
        ).length;

        if (cartItemCount) {
            cartItemCount.textContent = totalItems;
        }

        if (cartEmptyMessage) {
            cartEmptyMessage.hidden = totalItems !== 0;
        }

    }


    // ====================================
    // QUANTITY & REMOVE PRODUCT
    // ====================================

    cartItems.addEventListener('click', function (event) {

        const button = event.target.closest('button');

        if (!button) return;

        const cartItem = button.closest('[data-cart-item]');

        if (!cartItem) return;

        const qtyInput = cartItem.querySelector(
            '.cart-quantity input'
        );


        // Remove Product
        if (button.hasAttribute('data-remove-item')) {

            cartItem.remove();

            updateCartCount();

            return;
        }

        if (!qtyInput) return;

        const minQty = Number(qtyInput.min) || 1;
        const maxQty = Number(qtyInput.max) || 9999;

        const currentQty = Number.isInteger(Number(qtyInput.value))
            ? Number(qtyInput.value)
            : minQty;


        // Increase Quantity
        if (button.hasAttribute('data-qty-plus')) {

            qtyInput.value = Math.min(
                maxQty,
                Math.max(minQty, currentQty) + 1
            );

        }


        // Decrease Quantity
        if (button.hasAttribute('data-qty-minus')) {

            qtyInput.value = Math.max(
                minQty,
                currentQty - 1
            );

        }

    });


    // ====================================
    // MANUAL QUANTITY INPUT
    // ====================================

    cartItems.addEventListener('change', function (event) {

        if (!event.target.matches('.cart-quantity input')) {
            return;
        }

        const qtyInput = event.target;

        const minQty = Number(qtyInput.min) || 1;
        const maxQty = Number(qtyInput.max) || 9999;

        const quantity = Number(qtyInput.value);

        qtyInput.value = Number.isInteger(quantity)
            ? Math.max(minQty, Math.min(maxQty, quantity))
            : minQty;

    });


    // Initial Cart Count
    updateCartCount();

});

 </script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const profile = document.getElementById('memberProfile');
    if (!profile) return;
    document.getElementById('copyMemberEmail')?.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(document.getElementById('memberDisplayEmail').textContent);
            frontendAlert('คัดลอกอีเมลแล้ว', 'success');
        } catch (_) { frontendAlert('ไม่สามารถคัดลอกได้ กรุณาคัดลอกอีเมลด้วยตนเอง', 'error'); }
    });
    profile.querySelectorAll('[data-member-password]').forEach(button => {
        button.addEventListener('click', () => {
            const field = document.getElementById(button.dataset.memberPassword);
            field.type = field.type === 'password' ? 'text' : 'password';
            button.setAttribute('aria-pressed', String(field.type === 'text'));
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const history = document.getElementById('purchaseHistory');
    if (!history) return;

    const rows = Array.from(history.querySelectorAll('[data-history-row]'));
    const search = document.getElementById('historySearch');
    const from = document.getElementById('historyDateFrom');
    const to = document.getElementById('historyDateTo');
    const pages = document.getElementById('historyPages');
    const previous = document.getElementById('historyPrevious');
    const next = document.getElementById('historyNext');
    const resultStatus = document.getElementById('historyResultStatus');
    const dateHeading = document.getElementById('historyDateHeading');
    const totalHeading = document.getElementById('historyTotalHeading');
    const tabs = history.querySelectorAll('[data-history-tab]');
    const pageSize = 9;
    let status = 'all';
    let page = 1;
    let sortKey = 'date';
    let descending = true;
    let filtered = [];

    function render() {
        const keyword = search.value.trim().toLowerCase();
        to.setCustomValidity(from.value && to.value && from.value > to.value ? 'วันที่สิ้นสุดต้องไม่ก่อนวันที่เริ่มต้น' : '');
        filtered = rows.filter(function (row) {
            return (status === 'all' || row.dataset.status === status) &&
                row.dataset.order.toLowerCase().includes(keyword) &&
                (!from.value || row.dataset.date >= from.value) &&
                (!to.value || row.dataset.date <= to.value);
        }).sort(function (a, b) {
            const difference = sortKey === 'total' ? Number(a.dataset.total) - Number(b.dataset.total) : a.dataset.date.localeCompare(b.dataset.date);
            return descending ? -difference : difference;
        });
        const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
        page = Math.max(1, Math.min(page, pageCount));
        rows.forEach(function (row) { row.hidden = true; });
        filtered.forEach(function (row, index) {
            document.getElementById('historyRows').appendChild(row);
            row.hidden = index < (page - 1) * pageSize || index >= page * pageSize;
        });
        pages.replaceChildren();
        for (let number = 1; number <= pageCount; number++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = String(number);
            button.dataset.historyPage = String(number);
            if (number === page) {
                button.className = 'is-active';
                button.setAttribute('aria-current', 'page');
            }
            pages.appendChild(button);
        }
        tabs.forEach(function (tab) {
            const active = tab.dataset.historyTab === status;
            tab.classList.toggle('is-active', active);
            tab.setAttribute('aria-pressed', String(active));
        });
        const direction = descending ? 'descending' : 'ascending';
        dateHeading.setAttribute('aria-sort', sortKey === 'date' ? direction : 'none');
        totalHeading.setAttribute('aria-sort', sortKey === 'total' ? direction : 'none');
        document.getElementById('historySort').setAttribute('aria-label', sortKey === 'date' && descending ? 'เรียงวันที่เก่าสุดก่อน' : 'เรียงวันที่ล่าสุดก่อน');
        previous.disabled = page === 1;
        next.disabled = page === pageCount;
        document.getElementById('historyEmpty').hidden = filtered.length !== 0;
        resultStatus.textContent = 'พบ ' + filtered.length + ' รายการ หน้า ' + page + ' จาก ' + pageCount;
    }

    function selectStatus(value) { status = value; page = 1; render(); }
    tabs.forEach(function (tab) { tab.addEventListener('click', function () { selectStatus(tab.dataset.historyTab); }); });
    history.querySelectorAll('[data-history-quick]').forEach(function (button) {
        button.addEventListener('click', function () { selectStatus(button.dataset.historyQuick); });
    });
    search.addEventListener('input', function () { page = 1; render(); });
    [from, to].forEach(function (input) {
        input.addEventListener('change', function () { page = 1; render(); if (!to.checkValidity()) to.reportValidity(); });
    });
    document.getElementById('historyClearDates').addEventListener('click', function () { from.value = ''; to.value = ''; page = 1; render(); });
    document.getElementById('historyReset').addEventListener('click', function () {
        search.value = ''; from.value = ''; to.value = ''; sortKey = 'date'; descending = true; selectStatus('all');
    });
    document.getElementById('historySort').addEventListener('click', function () {
        descending = sortKey === 'date' ? !descending : true; sortKey = 'date'; page = 1; render();
    });
    document.getElementById('historySortTotal').addEventListener('click', function () {
        descending = sortKey === 'total' ? !descending : true; sortKey = 'total'; page = 1; render();
    });
    pages.addEventListener('click', function (event) {
        const button = event.target.closest('[data-history-page]');
        if (button) { page = Number(button.dataset.historyPage); render(); }
    });
    previous.addEventListener('click', function () { page--; render(); });
    next.addEventListener('click', function () { page++; render(); });

    history.querySelectorAll('[data-history-details]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('[data-history-row]');
            ['Order', 'Items', 'Date', 'Total', 'Status'].forEach(function (name, index) {
                document.getElementById('historyDetail' + name).textContent = row.cells[index].textContent.trim();
            });
            document.getElementById('historyOrderTitle').textContent = 'Order Details ' + row.dataset.order;
        });
    });
    document.getElementById('historyExport').addEventListener('click', function () {
        const csvRows = [['Order Id', 'Product List', 'Date', 'Total', 'Status']].concat(filtered.map(function (row) {
            return Array.from(row.cells).slice(0, 5).map(function (cell) { return cell.textContent.trim(); });
        }));
        const csv = '\uFEFF' + csvRows.map(function (line) {
            return line.map(function (value) { return '"' + value.replace(/"/g, '""') + '"'; }).join(',');
        }).join('\r\n');
        const url = URL.createObjectURL(new Blob([csv], { type: 'text/csv;charset=utf-8;' }));
        const link = document.createElement('a');
        link.href = url; link.download = 'purchase-history.csv';
        document.body.appendChild(link); link.click(); link.remove();
        setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
        resultStatus.textContent = 'ส่งออก CSV จำนวน ' + filtered.length + ' รายการแล้ว';
    });
    render();
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const history = document.getElementById('paymentHistory');
    if (!history) return;

    const rows = Array.from(history.querySelectorAll('[data-payment-row]'));
    const search = document.getElementById('paymentSearch');
    const date = document.getElementById('paymentDate');
    const status = document.getElementById('paymentStatus');
    const pages = document.getElementById('paymentPages');
    const previous = document.getElementById('paymentPrevious');
    const next = document.getElementById('paymentNext');
    const pageSize = 9;
    let page = 1;

    function render() {
        const keyword = search.value.trim().toLowerCase();
        const filtered = rows.filter(function (row) {
            return (!status.value || row.dataset.status === status.value) &&
                (!date.value || row.dataset.date.startsWith(date.value)) &&
                row.dataset.order.toLowerCase().includes(keyword);
        });
        const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
        page = Math.max(1, Math.min(page, pageCount));
        rows.forEach(function (row) { row.hidden = true; });
        filtered.slice((page - 1) * pageSize, page * pageSize).forEach(function (row) { row.hidden = false; });
        pages.replaceChildren();
        for (let number = 1; number <= pageCount; number++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = String(number);
            button.dataset.paymentPage = String(number);
            if (number === page) {
                button.className = 'is-active';
                button.setAttribute('aria-current', 'page');
            }
            pages.appendChild(button);
        }
        previous.disabled = page === 1;
        next.disabled = page === pageCount;
        document.getElementById('paymentEmpty').hidden = filtered.length !== 0;
        document.getElementById('paymentResultStatus').textContent = 'พบ ' + filtered.length + ' รายการ หน้า ' + page + ' จาก ' + pageCount;
    }

    search.addEventListener('input', function () { page = 1; render(); });
    [date, status].forEach(function (field) {
        field.addEventListener('change', function () { page = 1; render(); });
    });
    history.querySelectorAll('[data-payment-quick]').forEach(function (button) {
        button.addEventListener('click', function () { status.value = button.dataset.paymentQuick; page = 1; render(); });
    });
    pages.addEventListener('click', function (event) {
        const button = event.target.closest('[data-payment-page]');
        if (button) { page = Number(button.dataset.paymentPage); render(); }
    });
    previous.addEventListener('click', function () { page--; render(); });
    next.addEventListener('click', function () { page++; render(); });

    history.querySelectorAll('[data-payment-details]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('[data-payment-row]');
            ['Date', 'Order', 'Invoice', 'Total', 'Method', 'Status'].forEach(function (name, index) {
                document.getElementById('paymentDetail' + name).textContent = row.cells[index].textContent.trim();
            });
            document.getElementById('paymentDetailTitle').textContent = 'Payment Details ' + row.dataset.order;
        });
    });
    render();
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const history = document.getElementById('buyerCredit');
    if (!history) return;

    const rows = Array.from(history.querySelectorAll('[data-credit-row]'));
    const search = document.getElementById('creditSearch');
    const date = document.getElementById('creditDate');
    const status = document.getElementById('creditStatus');
    const pages = document.getElementById('creditPages');
    const previous = document.getElementById('creditPrevious');
    const next = document.getElementById('creditNext');
    const pageSize = 9;
    let page = 1;

    function render() {
        const keyword = search.value.trim().toLowerCase();
        const filtered = rows.filter(function (row) {
            return (!status.value || row.dataset.status === status.value) &&
                (!date.value || row.dataset.date.startsWith(date.value)) &&
                (row.dataset.order.toLowerCase().includes(keyword) || row.dataset.invoice.toLowerCase().includes(keyword));
        });
        const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
        page = Math.max(1, Math.min(page, pageCount));
        rows.forEach(function (row) { row.hidden = true; });
        filtered.slice((page - 1) * pageSize, page * pageSize).forEach(function (row) { row.hidden = false; });
        pages.replaceChildren();
        for (let number = 1; number <= pageCount; number++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = String(number);
            button.dataset.creditPage = String(number);
            if (number === page) {
                button.className = 'is-active';
                button.setAttribute('aria-current', 'page');
            }
            pages.appendChild(button);
        }
        previous.disabled = page === 1;
        next.disabled = page === pageCount;
        document.getElementById('creditEmpty').hidden = filtered.length !== 0;
        document.getElementById('creditResultStatus').textContent = 'พบ ' + filtered.length + ' รายการ หน้า ' + page + ' จาก ' + pageCount;
    }

    search.addEventListener('input', function () { page = 1; render(); });
    [date, status].forEach(function (field) {
        field.addEventListener('change', function () { page = 1; render(); });
    });
    history.querySelectorAll('[data-credit-quick]').forEach(function (button) {
        button.addEventListener('click', function () { status.value = button.dataset.creditQuick; page = 1; render(); });
    });
    pages.addEventListener('click', function (event) {
        const button = event.target.closest('[data-credit-page]');
        if (button) { page = Number(button.dataset.creditPage); render(); }
    });
    previous.addEventListener('click', function () { page--; render(); });
    next.addEventListener('click', function () { page++; render(); });

    history.querySelectorAll('[data-credit-details]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('[data-credit-row]');
            ['Date', 'Status', 'Invoice', 'Items', 'Total', 'Amount', 'Balance'].forEach(function (name, index) {
                document.getElementById('creditDetail' + name).textContent = row.cells[index].textContent.trim();
            });
            document.getElementById('creditDetailOrder').textContent = row.dataset.order;
            document.getElementById('creditDetailTitle').textContent = 'Credit Details ' + row.dataset.invoice;
        });
    });
    render();
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const history = document.getElementById('purchaseOrderList');
    if (!history) return;

    const rows = Array.from(history.querySelectorAll('[data-po-row]'));
    const search = document.getElementById('poSearch');
    const date = document.getElementById('poDate');
    const status = document.getElementById('poStatus');
    const pages = document.getElementById('poPages');
    const previous = document.getElementById('poPrevious');
    const next = document.getElementById('poNext');
    const pageSize = 9;
    let page = 1;

    function render() {
        const keyword = search.value.trim().toLowerCase();
        const filtered = rows.filter(function (row) {
            return (!status.value || row.dataset.status === status.value) &&
                (!date.value || row.dataset.date.startsWith(date.value)) &&
                (row.dataset.order.toLowerCase().includes(keyword) || row.dataset.invoice.toLowerCase().includes(keyword));
        });
        const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
        page = Math.max(1, Math.min(page, pageCount));
        rows.forEach(function (row) { row.hidden = true; });
        filtered.slice((page - 1) * pageSize, page * pageSize).forEach(function (row) { row.hidden = false; });
        pages.replaceChildren();
        for (let number = 1; number <= pageCount; number++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = String(number);
            button.dataset.poPage = String(number);
            if (number === page) {
                button.className = 'is-active';
                button.setAttribute('aria-current', 'page');
            }
            pages.appendChild(button);
        }
        previous.disabled = page === 1;
        next.disabled = page === pageCount;
        document.getElementById('poEmpty').hidden = filtered.length !== 0;
        document.getElementById('poResultStatus').textContent = 'พบ ' + filtered.length + ' รายการ หน้า ' + page + ' จาก ' + pageCount;
    }

    search.addEventListener('input', function () { page = 1; render(); });
    [date, status].forEach(function (field) {
        field.addEventListener('change', function () { page = 1; render(); });
    });
    pages.addEventListener('click', function (event) {
        const button = event.target.closest('[data-po-page]');
        if (button) { page = Number(button.dataset.poPage); render(); }
    });
    previous.addEventListener('click', function () { page--; render(); });
    next.addEventListener('click', function () { page++; render(); });

    history.querySelectorAll('[data-po-details]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('[data-po-row]');
            ['Date', 'Invoice', 'Items', 'Total', 'Status', 'Balance'].forEach(function (name, index) {
                document.getElementById('poDetail' + name).textContent = row.cells[index].textContent.trim();
            });
            document.getElementById('poDetailOrder').textContent = row.dataset.order;
            document.getElementById('poDetailTitle').textContent = 'Purchase Order Details ' + row.dataset.invoice;
        });
    });
    render();
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const history = document.getElementById('invoiceList');
    if (!history) return;

    const rows = Array.from(history.querySelectorAll('[data-invoice-row]'));
    const search = document.getElementById('invoiceSearch');
    const date = document.getElementById('invoiceDate');
    const status = document.getElementById('invoiceStatus');
    const pages = document.getElementById('invoicePages');
    const previous = document.getElementById('invoicePrevious');
    const next = document.getElementById('invoiceNext');
    const pageSize = 9;
    let page = 1;

    function render() {
        const keyword = search.value.trim().toLowerCase();
        const filtered = rows.filter(function (row) {
            return (!status.value || row.dataset.status === status.value) &&
                (!date.value || row.dataset.date.startsWith(date.value)) &&
                (row.dataset.order.toLowerCase().includes(keyword) || row.dataset.invoice.toLowerCase().includes(keyword));
        });
        const pageCount = Math.max(1, Math.ceil(filtered.length / pageSize));
        page = Math.max(1, Math.min(page, pageCount));
        rows.forEach(function (row) { row.hidden = true; });
        filtered.slice((page - 1) * pageSize, page * pageSize).forEach(function (row) { row.hidden = false; });
        pages.replaceChildren();
        for (let number = 1; number <= pageCount; number++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = String(number);
            button.dataset.invoicePage = String(number);
            if (number === page) {
                button.className = 'is-active';
                button.setAttribute('aria-current', 'page');
            }
            pages.appendChild(button);
        }
        previous.disabled = page === 1;
        next.disabled = page === pageCount;
        document.getElementById('invoiceEmpty').hidden = filtered.length !== 0;
        document.getElementById('invoiceResultStatus').textContent = 'พบ ' + filtered.length + ' รายการ หน้า ' + page + ' จาก ' + pageCount;
    }

    search.addEventListener('input', function () { page = 1; render(); });
    [date, status].forEach(function (field) {
        field.addEventListener('change', function () { page = 1; render(); });
    });
    pages.addEventListener('click', function (event) {
        const button = event.target.closest('[data-invoice-page]');
        if (button) { page = Number(button.dataset.invoicePage); render(); }
    });
    previous.addEventListener('click', function () { page--; render(); });
    next.addEventListener('click', function () { page++; render(); });

    history.querySelectorAll('[data-invoice-details]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('[data-invoice-row]');
            ['Date', 'Order', 'Invoice', 'Total', 'Method', 'Status', 'DueDate'].forEach(function (name, index) {
                document.getElementById('invoiceDetail' + name).textContent = row.cells[index].textContent.trim();
            });
            document.getElementById('invoiceDetailTitle').textContent = 'Invoice Details ' + row.dataset.invoice;
        });
    });
    render();
});
</script>

<?php require resource_path('views/frontend/partials/menu-scripts.php'); ?>
