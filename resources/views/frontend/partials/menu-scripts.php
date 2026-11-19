<script>
// New Model: filter the static HTML cards without rebuilding their content.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.querySelector('.new-model-page');
    if (!page) return;

    const grid = page.querySelector('#newModelProductGrid');
    const items = Array.from(grid.querySelectorAll('.product-item'));
    const categories = Array.from(page.querySelectorAll('.new-model-panel__tab'));
    const search = page.querySelector('#newModelSearch');
    const empty = page.querySelector('#newModelEmpty');
    const status = page.querySelector('#newModelStatus');
    const pagination = page.querySelector('.new-model-panel__pagination');
    let category = 'all';
    const normalize = function (value) { return value.trim().toLocaleLowerCase(); };

    function filterProducts() {
        const keyword = normalize(search.value);
        let count = 0;
        items.forEach(function (item) {
            const productText = item.querySelector('.product-card__title').textContent + ' ' +
                item.querySelector('.product-card__description').textContent;
            const visible = (category === 'all' || item.dataset.category === category) &&
                normalize(productText).includes(keyword);
            item.hidden = !visible;
            if (visible) count++;
        });
        categories.forEach(function (button) {
            const active = button.dataset.filter === category;
            button.classList.toggle('active', active);
            button.setAttribute('aria-pressed', String(active));
        });
        empty.hidden = count > 0;
        pagination.hidden = category !== 'all' || keyword !== '';
        status.textContent = 'แสดงสินค้า ' + count + ' รายการ';
    }

    categories.forEach(function (button) {
        button.addEventListener('click', function () {
            category = button.dataset.filter;
            filterProducts();
        });
    });
    search.addEventListener('input', filterProducts);

    const views = Array.from(page.querySelectorAll('.new-model-panel__view'));
    views.forEach(function (button) {
        button.addEventListener('click', function () {
            grid.classList.toggle('is-list', button.dataset.view === 'list');
            views.forEach(function (view) {
                const active = view === button;
                view.classList.toggle('active', active);
                view.setAttribute('aria-pressed', String(active));
            });
        });
    });

    const topSearch = page.querySelector('#newModelTopSearch');
    const topItems = Array.from(page.querySelectorAll('.new-model-sidebar__product-list li'));
    topSearch.addEventListener('input', function () {
        const keyword = normalize(topSearch.value);
        let count = 0;
        topItems.forEach(function (item) {
            item.hidden = !normalize(item.textContent).includes(keyword);
            if (!item.hidden) count++;
        });
        page.querySelector('#newModelTopEmpty').hidden = count > 0;
    });
    filterProducts();
});
</script>

<script>
// Top Sale: filter the static HTML cards without rebuilding their content.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.querySelector('.top-sale-page');
    if (!page) return;

    const grid = page.querySelector('#topSaleProductGrid');
    const items = Array.from(grid.querySelectorAll('.product-item'));
    const categories = Array.from(page.querySelectorAll('.top-sale-panel__tab'));
    const search = page.querySelector('#topSaleSearch');
    const empty = page.querySelector('#topSaleEmpty');
    const status = page.querySelector('#topSaleStatus');
    const pagination = page.querySelector('.top-sale-panel__pagination');
    let category = 'all';
    const normalize = function (value) { return value.trim().toLocaleLowerCase(); };

    function filterProducts() {
        const keyword = normalize(search.value);
        let count = 0;
        items.forEach(function (item) {
            const productText = item.querySelector('.product-card__title').textContent + ' ' +
                item.querySelector('.product-card__description').textContent;
            const visible = (category === 'all' || item.dataset.category === category) &&
                normalize(productText).includes(keyword);
            item.hidden = !visible;
            if (visible) count++;
        });
        categories.forEach(function (button) {
            const active = button.dataset.filter === category;
            button.classList.toggle('active', active);
            button.setAttribute('aria-pressed', String(active));
        });
        empty.hidden = count > 0;
        pagination.hidden = category !== 'all' || keyword !== '';
        status.textContent = 'แสดงสินค้า ' + count + ' รายการ';
    }

    categories.forEach(function (button) {
        button.addEventListener('click', function () {
            category = button.dataset.filter;
            filterProducts();
        });
    });
    search.addEventListener('input', filterProducts);

    const views = Array.from(page.querySelectorAll('.top-sale-panel__view'));
    views.forEach(function (button) {
        button.addEventListener('click', function () {
            grid.classList.toggle('is-list', button.dataset.view === 'list');
            views.forEach(function (view) {
                const active = view === button;
                view.classList.toggle('active', active);
                view.setAttribute('aria-pressed', String(active));
            });
        });
    });

    const topSearch = page.querySelector('#topSaleTopSearch');
    const topItems = Array.from(page.querySelectorAll('.top-sale-sidebar__product-list li'));
    topSearch.addEventListener('input', function () {
        const keyword = normalize(topSearch.value);
        let count = 0;
        topItems.forEach(function (item) {
            item.hidden = !normalize(item.textContent).includes(keyword);
            if (!item.hidden) count++;
        });
        page.querySelector('#topSaleTopEmpty').hidden = count > 0;
    });
    filterProducts();
});
</script>

<script>
// Promotion: search and details for the static campaign examples.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.querySelector('.promotion-page');
    if (!page) return;
    const normalize = function (text) { return text.trim().toLocaleLowerCase(); };
    const grid = page.querySelector('#promotionGrid');

    if (grid) {
        const cards = Array.from(grid.querySelectorAll('[data-promotion-card]'));
        const search = page.querySelector('#promotionSearch');
        const pagination = page.querySelector('.promotion-panel__pagination');

        function searchPromotions() {
            const keyword = normalize(search.value);
            let count = 0;
            cards.forEach(function (card) {
                const matches = normalize(card.textContent).includes(keyword);
                card.hidden = !matches;
                if (matches) count++;
            });
            page.querySelector('#promotionEmpty').hidden = count > 0;
            page.querySelector('#promotionStatus').textContent = 'แสดงโปรโมชั่น ' + count + ' รายการ';
            pagination.hidden = keyword !== '';
        }
        search.addEventListener('input', searchPromotions);
        searchPromotions();
    }

    // Each sidebar search only filters its own product list, on both listing and detail pages.
    page.querySelectorAll('[data-promotion-products]').forEach(function (section) {
        const search = section.querySelector('[data-promotion-product-search]');
        const items = Array.from(section.querySelectorAll('[data-promotion-product]'));
        search.addEventListener('input', function () {
            const keyword = normalize(search.value);
            let count = 0;
            items.forEach(function (item) {
                item.hidden = !normalize(item.textContent).includes(keyword);
                if (!item.hidden) count++;
            });
            section.querySelector('[data-promotion-product-empty]').hidden = count > 0;
        });
    });

    const detail = page.querySelector('[data-promotion-detail]');
    if (detail) {
        // A fixed allowlist supplies all displayed content; query strings are never inserted as HTML.
        const tireCampaign = {
            category: 'Tire EV',
            title: 'โปรโมชั่นผ่อน 0% นาน 10 เดือน',
            intro: 'ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น',
            description: 'เพิ่มความมั่นใจในทุกการเดินทางด้วยยางชุดใหม่ พร้อมแบ่งชำระ 0% นาน 10 เดือน สำหรับยาง BRIDGESTONE หรือ FIRESTONE ที่ร่วมรายการ เมื่อซื้อครบ 4 เส้น',
            benefit1: 'ผ่อนชำระ 0% นาน 10 เดือน',
            benefit2: 'สำหรับยาง BRIDGESTONE หรือ FIRESTONE ที่ร่วมรายการ',
            benefit3: 'รับสิทธิ์เมื่อเปลี่ยนยางครบ 4 เส้น',
            condition1: 'ใช้สิทธิ์สำหรับสินค้าและรุ่นที่ร่วมรายการเท่านั้น'
        };
        const campaigns = new Map([
            ['tire-installment', tireCampaign],
            ['ev-charger', {
                category: 'EV Charger',
                title: 'โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ',
                intro: 'ข้อเสนอพิเศษสำหรับ Portable EV Charger ชาร์จสะดวก พร้อมอุปกรณ์ครบชุด',
                description: 'เลือกเครื่องชาร์จแบบพกพาสำหรับรถยนต์ไฟฟ้าของคุณ พร้อมข้อเสนอพิเศษสำหรับรุ่นที่ร่วมรายการ กรุณาตรวจสอบประเภทหัวชาร์จและระบบไฟที่รองรับกับเจ้าหน้าที่ก่อนสั่งซื้อ',
                benefit1: 'ข้อเสนอพิเศษสำหรับ Portable EV Charger ที่ร่วมรายการ',
                benefit2: 'พร้อมอุปกรณ์ชาร์จครบชุดตามรายละเอียดของสินค้าแต่ละรุ่น',
                benefit3: 'สอบถามข้อมูลเพื่อเลือกเครื่องชาร์จให้เหมาะกับรถของคุณ',
                condition1: 'ใช้สิทธิ์สำหรับเครื่องชาร์จ EV รุ่นที่ร่วมรายการ และตรวจสอบความเข้ากันได้ก่อนสั่งซื้อ'
            }]
        ]);
        const key = new URLSearchParams(window.location.search).get('promotion');
        const campaign = campaigns.get(key) || tireCampaign;
        detail.querySelectorAll('[data-promotion-detail-field]').forEach(function (field) {
            const text = campaign[field.dataset.promotionDetailField];
            if (typeof text === 'string') field.textContent = text;
        });
        detail.querySelector('.promotion-detail__banner').alt = campaign.title;
        document.title = campaign.title + ' | Alpha Auto Company';
    }
});
</script>

<script>
// Catalogue: keep downloads as native links and announce the requested file.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.querySelector('.catalogue-page');
    if (!page) return;
    const status = page.querySelector('#catalogueDownloadStatus');
    page.querySelectorAll('[data-catalogue-download]').forEach(function (link) {
        link.addEventListener('click', function () {
            const card = link.closest('.catalogue-card');
            const title = card.querySelector('.catalogue-card__title').textContent.trim();
            status.textContent = 'ส่งคำขอดาวน์โหลด ' + title + ' (PDF ตัวอย่าง) แล้ว';
        });
    });
});
</script>

<script>
// Product warranty registration: browser-only validation for the static form.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.getElementById('warrantyRegister');
    if (!page) return;

    const form = page.querySelector('#warrantyRegisterForm');
    const registrationDate = page.querySelector('#warrantyRegisterDate');
    const purchaseDate = page.querySelector('#warrantyPurchaseDate');
    const phone = page.querySelector('#warrantyPhone');
    const quantity = page.querySelector('#warrantyQuantity');
    const receipt = page.querySelector('#warrantyReceipt');
    const receiptStatus = page.querySelector('#warrantyReceiptStatus');
    const receiptPreviews = page.querySelector('#warrantyReceiptPreviews');
    let receiptPreviewUrls = [];
    const status = page.querySelector('#warrantyRegisterStatus');
    const dateParts = new Intl.DateTimeFormat('en-US', {
        timeZone: 'Asia/Bangkok', year: 'numeric', month: '2-digit', day: '2-digit'
    }).formatToParts(new Date());
    const part = function (type) { return dateParts.find(function (item) { return item.type === type; }).value; };
    const today = part('year') + '-' + part('month') + '-' + part('day');
    registrationDate.max = today;

    function validateDates() {
        purchaseDate.max = registrationDate.value && registrationDate.value < today ? registrationDate.value : today;
        purchaseDate.setCustomValidity(
            purchaseDate.value && registrationDate.value && purchaseDate.value > registrationDate.value
                ? 'วันที่ซื้อสินค้าต้องไม่เกินวันที่ลงทะเบียน' : ''
        );
    }
    function validatePhone() {
        const value = phone.value.trim().replace(/[\s()-]/g, '');
        phone.setCustomValidity(value && !/^\+?\d{8,15}$/.test(value)
            ? 'กรุณาระบุเบอร์ติดต่อ 8–15 หลัก สามารถใช้รหัสประเทศขึ้นต้นด้วย + ได้' : '');
    }
    function validateQuantity() {
        const value = Number(quantity.value);
        quantity.setCustomValidity(quantity.value && (!Number.isInteger(value) || value < 1)
            ? 'กรุณาระบุจำนวนสินค้าเป็นจำนวนเต็มตั้งแต่ 1 ขึ้นไป' : '');
    }
    function validateReceipt() {
        const files = Array.from(receipt.files);
        const errors = [];
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'];
        files.forEach(function (file) {
            const allowedExtension = /\.(jpe?g|png|webp|pdf)$/i.test(file.name);
            if (!(file.type ? allowedTypes.includes(file.type) : allowedExtension)) {
                errors.push(file.name + ': กรุณาแนบไฟล์ JPG, PNG, WEBP หรือ PDF');
            } else if (file.size > 5 * 1024 * 1024) {
                errors.push(file.name + ': ขนาดไฟล์ต้องไม่เกิน 5 MB');
            }
        });
        const error = errors.join(' • ');
        receipt.setCustomValidity(error);
        receiptStatus.textContent = error;
        receiptStatus.hidden = errors.length === 0;
    }

    function clearReceiptPreviews() {
        receiptPreviews.replaceChildren();
        receiptPreviewUrls.forEach(function (url) { URL.revokeObjectURL(url); });
        receiptPreviewUrls = [];
        receiptPreviews.hidden = true;
    }
    function renderReceiptPreviews() {
        clearReceiptPreviews();
        Array.from(receipt.files).forEach(function (file) {
            const isImage = ['image/jpeg', 'image/png', 'image/webp'].includes(file.type) ||
                (!file.type && /\.(jpe?g|png|webp)$/i.test(file.name));
            const isPdf = file.type === 'application/pdf' || (!file.type && /\.pdf$/i.test(file.name));
            if ((!isImage && !isPdf) || file.size > 5 * 1024 * 1024) return;

            const item = document.createElement('li');
            item.className = 'warranty-register__preview';
            if (isImage) {
                const image = document.createElement('img');
                const url = URL.createObjectURL(file);
                receiptPreviewUrls.push(url);
                image.src = url;
                image.alt = file.name;
                image.width = 96;
                image.height = 96;
                image.addEventListener('error', function () {
                    const fallback = document.createElement('span');
                    fallback.className = 'warranty-register__preview-file';
                    fallback.textContent = 'ไม่สามารถแสดงรูป';
                    image.replaceWith(fallback);
                });
                item.appendChild(image);
            } else {
                const icon = document.createElement('span');
                icon.className = 'warranty-register__preview-file';
                icon.setAttribute('aria-label', 'ไฟล์ PDF');
                const symbol = document.createElement('i');
                symbol.className = 'bi bi-file-earmark-pdf';
                symbol.setAttribute('aria-hidden', 'true');
                icon.appendChild(symbol);
                item.appendChild(icon);
            }
            receiptPreviews.appendChild(item);
        });
        receiptPreviews.hidden = receiptPreviews.childElementCount === 0;
    }

    registrationDate.addEventListener('input', validateDates);
    purchaseDate.addEventListener('input', validateDates);
    phone.addEventListener('input', validatePhone);
    quantity.addEventListener('input', validateQuantity);
    receipt.addEventListener('change', function () {
        validateReceipt();
        renderReceiptPreviews();
    });
    form.addEventListener('input', function () { status.hidden = true; });
    form.addEventListener('change', function () { status.hidden = true; });
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        form.querySelectorAll('input[type="text"], input[type="tel"]').forEach(function (field) {
            field.value = field.value.trim();
        });
        validateDates();
        validatePhone();
        validateQuantity();
        validateReceipt();
        if (!form.reportValidity()) return;
        status.textContent = 'ตรวจสอบข้อมูลเรียบร้อยแล้ว หน้านี้เป็นตัวอย่าง Static ข้อมูลและไฟล์แนบยังไม่ได้บันทึกหรือส่งลงระบบ';
        window.frontendAlert?.(status.textContent, 'info');
        status.hidden = false;
        status.focus();
    });
    window.addEventListener('pagehide', clearReceiptPreviews);
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) renderReceiptPreviews();
    });
    validateDates();
});
</script>

<script>
// Product claim: validate the static form and preview selected damage photos locally.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.getElementById('claimProduct');
    if (!page) return;

    const form = page.querySelector('#claimProductForm');
    const phone = page.querySelector('#claimPhone');
    const photos = page.querySelector('#claimDamagePhotos');
    const photoStatus = page.querySelector('#claimDamageStatus');
    const previews = page.querySelector('#claimDamagePreviews');
    const status = page.querySelector('#claimProductStatus');
    let previewUrls = [];

    function validatePhone() {
        const value = phone.value.trim().replace(/[\s()-]/g, '');
        phone.setCustomValidity(value && !/^\+?\d{8,15}$/.test(value)
            ? 'กรุณาระบุเบอร์ติดต่อ 8–15 หลัก สามารถใช้รหัสประเทศขึ้นต้นด้วย + ได้' : '');
    }
    function photoError(file) {
        const validType = file.type ? ['image/jpeg', 'image/png', 'image/webp'].includes(file.type)
            : /\.(jpe?g|png|webp)$/i.test(file.name);
        if (!validType) return file.name + ': กรุณาแนบรูป JPG, PNG หรือ WEBP';
        if (file.size > 5 * 1024 * 1024) return file.name + ': ขนาดรูปต้องไม่เกิน 5 MB';
        return '';
    }
    function validatePhotos() {
        const errors = Array.from(photos.files).map(photoError).filter(Boolean);
        photos.setCustomValidity(errors.join(' • '));
        photoStatus.textContent = errors.join(' • ');
        photoStatus.hidden = errors.length === 0;
    }
    function clearPreviews() {
        previews.replaceChildren();
        previewUrls.forEach(function (url) { URL.revokeObjectURL(url); });
        previewUrls = [];
        previews.hidden = true;
    }
    function renderPreviews() {
        clearPreviews();
        Array.from(photos.files).forEach(function (file) {
            if (photoError(file)) return;
            const item = document.createElement('li');
            item.className = 'claim-product__preview';
            const image = document.createElement('img');
            const url = URL.createObjectURL(file);
            previewUrls.push(url);
            image.src = url;
            image.alt = file.name;
            image.width = 96;
            image.height = 96;
            image.addEventListener('error', function () {
                const fallback = document.createElement('span');
                fallback.className = 'claim-product__preview-file';
                fallback.textContent = 'ไม่สามารถแสดงรูป';
                image.replaceWith(fallback);
            });
            item.appendChild(image);
            previews.appendChild(item);
        });
        previews.hidden = previews.childElementCount === 0;
    }

    phone.addEventListener('input', validatePhone);
    photos.addEventListener('change', function () {
        validatePhotos();
        renderPreviews();
    });
    form.addEventListener('input', function () { status.hidden = true; });
    form.addEventListener('change', function () { status.hidden = true; });
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        form.querySelectorAll('input[type="text"], input[type="tel"], textarea').forEach(function (field) {
            field.value = field.value.trim();
        });
        validatePhone();
        validatePhotos();
        if (!form.reportValidity()) return;
        status.textContent = 'ตรวจสอบข้อมูลเรียบร้อยแล้ว หน้านี้เป็นตัวอย่าง Static ยังไม่ได้ส่งคำขอเคลมหรืออัปโหลดรูปเข้าระบบ';
        window.frontendAlert?.(status.textContent, 'info');
        status.hidden = false;
        status.focus();
    });
    window.addEventListener('pagehide', clearPreviews);
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) renderPreviews();
    });
});
</script>

<script>
// Claim list: filter static rows and keep detail edits in memory for this page only.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.getElementById('claimList');
    if (!page) return;
    const rows = Array.from(page.querySelectorAll('[data-claim-row]'));
    const records = new Map(rows.map(function (row) {
        return [row.dataset.id, { row: row, id: row.dataset.id, date: row.dataset.date,
            order: row.dataset.order, invoice: row.dataset.invoice, status: row.dataset.status,
            quantity: row.dataset.quantity, problem: row.dataset.problem, note: '', approvedAt: '' }];
    }));
    const labels = { pending: 'รอการตรวจสอบ', processing: 'รอการอนุมัติ', approved: 'อนุมัติ' };
    const filters = ['claimListNumber', 'claimListDate', 'claimListStatus', 'claimListOrder'].map(function (id) {
        return document.getElementById(id);
    });
    const modal = document.getElementById('claimDetailModal');
    const edit = document.getElementById('claimDetailEdit');
    const quantity = document.getElementById('claimDetailQuantity');
    const problem = document.getElementById('claimDetailProblem');
    const note = document.getElementById('claimDetailNote');
    const approve = document.getElementById('claimDetailApprove');
    const notice = document.getElementById('claimDetailNotice');
    let current = null;
    let editing = false;
    const normalize = function (value) { return value.trim().toLocaleLowerCase(); };
    const dateLabel = function (value) { return value.split('-').reverse().join('-'); };

    function filterRows() {
        const number = normalize(filters[0].value);
        const date = filters[1].value;
        const status = filters[2].value;
        const order = normalize(filters[3].value).replace(/^#/, '');
        let count = 0;
        records.forEach(function (record) {
            const visible = normalize(record.id).includes(number) && (!date || record.date === date) &&
                (!status || record.status === status) && normalize(record.order).includes(order);
            record.row.hidden = !visible;
            if (visible) count++;
        });
        document.getElementById('claimListEmpty').hidden = count > 0;
        document.getElementById('claimListResult').textContent = 'แสดงรายการเคลม ' + count + ' รายการ';
        page.querySelector('.claim-list__pagination').hidden = Boolean(number || date || status || order);
    }
    function refreshCounts() {
        const counts = { all: records.size, pending: 0, processing: 0, approved: 0 };
        records.forEach(function (record) { counts[record.status]++; });
        page.querySelectorAll('[data-claim-count]').forEach(function (element) {
            element.textContent = counts[element.dataset.claimCount];
        });
    }
    function announce(text) {
        notice.textContent = text + ' (ตัวอย่าง Static: ยังไม่ได้บันทึกลงระบบ)';
        notice.hidden = false;
    }
    function setEditing(value) {
        editing = value;
        quantity.readOnly = !value;
        problem.readOnly = !value;
        edit.querySelector('span').textContent = value ? 'Save Changes' : 'Edit';
        edit.setAttribute('aria-pressed', String(value));
    }
    function showDetails() {
        if (!current) return;
        document.getElementById('claimDetailTitle').textContent = current.id;
        const values = { id: current.id, date: dateLabel(current.date), order: '#' + current.order, invoice: current.invoice };
        modal.querySelectorAll('[data-claim-field]').forEach(function (element) {
            element.textContent = values[element.dataset.claimField];
        });
        const badge = document.getElementById('claimDetailStatus');
        badge.textContent = labels[current.status];
        badge.classList.toggle('is-approved', current.status === 'approved');
        quantity.value = current.quantity;
        problem.value = current.problem;
        note.value = current.note;
        approve.disabled = current.status === 'approved';
        const stage = { pending: 1, processing: 2, approved: 3 }[current.status];
        modal.querySelectorAll('[data-claim-step]').forEach(function (element) {
            const index = Number(element.dataset.claimStep);
            element.classList.toggle('is-complete', index < stage);
            element.classList.toggle('is-current', index === stage);
            element.querySelector('[data-claim-step-date]').textContent = index <= stage
                ? (index === 3 && current.approvedAt ? current.approvedAt : dateLabel(current.date) + ' | 10:00') : '-';
        });
        setEditing(false);
    }
    function saveEdits() {
        quantity.setCustomValidity(quantity.value && Number.isInteger(Number(quantity.value)) && Number(quantity.value) > 0
            ? '' : 'กรุณาระบุจำนวนเป็นจำนวนเต็มตั้งแต่ 1 ขึ้นไป');
        problem.value = problem.value.trim();
        if (!quantity.reportValidity() || !problem.reportValidity()) return false;
        current.quantity = quantity.value;
        current.problem = problem.value;
        current.row.dataset.quantity = current.quantity;
        current.row.dataset.problem = current.problem;
        setEditing(false);
        return true;
    }

    filters.forEach(function (field) {
        field.addEventListener(field.tagName === 'SELECT' ? 'change' : 'input', filterRows);
    });
    modal.addEventListener('show.bs.modal', function (event) {
        current = records.get(event.relatedTarget?.dataset.claimDetails) || null;
        if (!current) { event.preventDefault(); return; }
        notice.hidden = true;
        quantity.setCustomValidity('');
        showDetails();
    });
    modal.addEventListener('hidden.bs.modal', function () { current = null; setEditing(false); });
    edit.addEventListener('click', function () {
        if (!current) return;
        if (editing) {
            if (saveEdits()) announce('อัปเดตข้อมูลตัวอย่างในหน้าต่างนี้แล้ว');
        } else {
            setEditing(true);
            problem.focus();
        }
    });
    document.getElementById('claimDetailSaveNote').addEventListener('click', function () {
        if (!current) return;
        current.note = note.value.trim();
        note.value = current.note;
        announce('บันทึกหมายเหตุในตัวอย่างหน้านี้แล้ว');
    });
    note.addEventListener('input', function () { notice.hidden = true; });
    approve.addEventListener('click', function () {
        if (!current || current.status === 'approved' || (editing && !saveEdits())) return;
        current.note = note.value.trim();
        current.status = 'approved';
        current.approvedAt = new Intl.DateTimeFormat('en-GB', { timeZone: 'Asia/Bangkok',
            day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false
        }).format(new Date()).replaceAll('/', '-').replace(', ', ' | ');
        current.row.dataset.status = 'approved';
        const status = current.row.querySelector('[data-claim-row-status]');
        status.className = 'claim-list__status claim-list__status--approved';
        status.textContent = labels.approved;
        refreshCounts();
        filterRows();
        showDetails();
        announce('เปลี่ยนสถานะตัวอย่างเป็นอนุมัติแล้ว');
    });
    refreshCounts();
    filterRows();
});
</script>

<script>
// Contact Us: validate the static contact form without sending a message.
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactUsForm');
    if (!form) return;
    const status = document.getElementById('contactUsStatus');
    form.addEventListener('input', function () { status.hidden = true; });
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        form.querySelectorAll('input, textarea').forEach(function (field) { field.value = field.value.trim(); });
        if (!form.reportValidity()) return;
        status.textContent = 'ตรวจสอบข้อมูลเรียบร้อยแล้ว หน้านี้เป็นตัวอย่าง Static ยังไม่ได้ส่งข้อความถึงบริษัท';
        window.frontendAlert?.(status.textContent, 'info');
        status.hidden = false;
        status.focus();
    });
});
</script>



<script>
// Notifications: static in-memory read state, category and text filters.
document.addEventListener('DOMContentLoaded', function () {
    const page = document.getElementById('notificationsPage');
    if (!page) return;
    const items = Array.from(page.querySelectorAll('[data-notification-id]'));
    const categories = Array.from(page.querySelectorAll('[data-notification-category]'));
    const search = document.getElementById('notificationsSearch');
    const unreadOnly = document.getElementById('notificationsUnreadOnly');
    const markAll = document.getElementById('notificationsMarkAll');
    const empty = document.getElementById('notificationsEmpty');
    const reset = document.getElementById('notificationsReset');
    const requested = new URLSearchParams(window.location.search).get('category');
    let category = categories.some(function (button) { return button.dataset.notificationCategory === requested; }) ? requested : 'all';
    const normalize = function (value) { return value.trim().toLocaleLowerCase(); };

    function render() {
        const keyword = normalize(search.value);
        let visible = 0;
        let unread = 0;
        items.forEach(function (item) {
            const isUnread = item.dataset.read !== 'true';
            if (isUnread) unread++;
            const text = item.querySelector('h2').textContent + ' ' + item.querySelector('p').textContent;
            const matches = (category === 'all' || item.dataset.category === category) &&
                (!unreadOnly.checked || isUnread) && normalize(text).includes(keyword);
            item.hidden = !matches;
            if (matches) visible++;
            item.classList.toggle('is-unread', isUnread);
            item.querySelector('[data-notification-unread-label]').hidden = !isUnread;
            item.querySelector('[data-notification-toggle]').textContent = isUnread
                ? 'ทำเครื่องหมายว่าอ่านแล้ว' : 'ทำเครื่องหมายว่ายังไม่อ่าน';
        });
        const counts = { all: items.length, unread: unread, read: items.length - unread };
        page.querySelectorAll('[data-notification-count]').forEach(function (element) {
            element.textContent = counts[element.dataset.notificationCount];
        });
        categories.forEach(function (button) {
            const active = button.dataset.notificationCategory === category;
            button.classList.toggle('active', active);
            button.setAttribute('aria-pressed', String(active));
        });
        markAll.disabled = unread === 0;
        empty.hidden = visible > 0;
        document.getElementById('notificationsResult').textContent = 'แสดงการแจ้งเตือน ' + visible + ' รายการ จากทั้งหมด ' + items.length + ' รายการ';
        document.querySelectorAll('[data-notification-badge]').forEach(function (badge) {
            badge.textContent = unread + ' ใหม่';
            badge.hidden = unread === 0;
        });
        document.querySelectorAll('[data-notification-dot]').forEach(function (dot) { dot.hidden = unread === 0; });
    }
    categories.forEach(function (button) {
        button.addEventListener('click', function () {
            category = button.dataset.notificationCategory;
            render();
        });
    });
    search.addEventListener('input', render);
    unreadOnly.addEventListener('change', render);
    items.forEach(function (item) {
        item.querySelector('[data-notification-toggle]').addEventListener('click', function () {
            item.dataset.read = item.dataset.read === 'true' ? 'false' : 'true';
            render();
            if (item.hidden) unreadOnly.focus();
        });
        item.querySelector('[data-notification-open]').addEventListener('click', function () {
            item.dataset.read = 'true';
            render();
        });
    });
    markAll.addEventListener('click', function () {
        items.forEach(function (item) { item.dataset.read = 'true'; });
        render();
        if (!empty.hidden) reset.focus();
    });
    reset.addEventListener('click', function () {
        category = 'all';
        search.value = '';
        unreadOnly.checked = false;
        render();
        search.focus();
    });
    render();
});
</script>
