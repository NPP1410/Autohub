document.addEventListener('DOMContentLoaded', function () {
    const storageKey = 'alphaAuto.checkoutPreview';
    const confirmLink = document.getElementById('checkoutConfirm');
    const fieldIds = [
        'shippingAddress', 'district', 'subDistrict', 'city', 'pinCode',
        'phoneNumber', 'deliveryAddress', 'deliveryProvince', 'deliverySubDistrict', 'cardName'
    ];

    let preview = null;
    try {
        preview = JSON.parse(sessionStorage.getItem(storageKey) || 'null');
    } catch (error) {
        preview = null;
    }
    const hasPreview = preview && typeof preview === 'object' && !Array.isArray(preview);

    if (confirmLink) {
        // Keep non-sensitive edits when returning from the invoice to checkout.
        if (hasPreview) {
            fieldIds.forEach(function (id) {
                const field = document.getElementById(id);
                if (field && typeof preview[id] === 'string') field.value = preview[id];
            });
            const shipping = document.getElementById('shippingMethod');
            if (shipping) {
                Array.from(shipping.options).forEach(function (option) {
                    if (option.textContent.trim() === preview.shippingMethod) shipping.value = option.value;
                });
            }
            document.querySelectorAll('input[name="paymentMethod"]').forEach(function (radio) {
                radio.checked = radio.value === preview.paymentMethod;
            });
        }
        confirmLink.addEventListener('click', function () {
            const preview = {};
            fieldIds.forEach(function (id) {
                preview[id] = document.getElementById(id)?.value.trim() || '';
            });
            const shipping = document.getElementById('shippingMethod');
            preview.shippingMethod = shipping?.selectedOptions[0]?.textContent.trim() || '';
            preview.paymentMethod = document.querySelector('input[name="paymentMethod"]:checked')?.value || 'credit-card';
            // Only the last four digits belong in a preview. Never persist card numbers or CVV.
            const cardDigits = (document.getElementById('cardNumber')?.value || '').replace(/\D/g, '');
            preview.cardLastFour = cardDigits.length >= 4 ? cardDigits.slice(-4) : '';
            try {
                sessionStorage.setItem(storageKey, JSON.stringify(preview));
            } catch (error) {
                // The link still opens the default demo invoice if storage is unavailable.
            }
        });
    }

    if (!document.querySelector('.confirm-page')) return;

    if (hasPreview) {
        const value = function (key) {
            return typeof preview[key] === 'string' ? preview[key] : '';
        };
        const setText = function (key, text) {
            const element = document.querySelector('[data-confirm="' + key + '"]');
            if (element && text) element.textContent = text;
        };
        const address = [
            value('shippingAddress'),
            [value('district'), value('subDistrict'), value('city')].filter(Boolean).join(', '),
            value('pinCode')
        ].filter(Boolean).join('\n');
        setText('address', address);
        setText('shippingMethod', value('shippingMethod'));
        setText('deliveryAddress', [
            value('deliveryAddress'),
            [value('deliveryProvince'), value('deliverySubDistrict')].filter(Boolean).join(', '),
            value('city'), value('pinCode')
        ].filter(Boolean).join('\n'));
        setText('phone', value('phoneNumber'));
        const phone = document.querySelector('[data-confirm="phone"]');
        if (phone && value('phoneNumber')) {
            phone.href = 'tel:' + value('phoneNumber').replace(/[^\d+]/g, '');
        }
        const methods = {
            'credit-card': 'Credit/Debit Card',
            bank: 'ชำระเงินผ่านบัญชีธนาคาร',
            promptpay: 'ชำระเงินผ่านพร้อมเพย์ QR Code'
        };
        setText('paymentMethod', methods[value('paymentMethod')] || methods['credit-card']);
        setText('cardName', value('cardName'));
        setText('cardNumber', /^\d{4}$/.test(value('cardLastFour')) ? '•••• •••• •••• ' + value('cardLastFour') : 'ยังไม่ได้ระบุ');
        document.querySelectorAll('[data-card-detail]').forEach(function (row) {
            row.hidden = value('paymentMethod') !== 'credit-card';
        });
    }

    document.getElementById('saveInvoicePdf')?.addEventListener('click', function () {
        window.print();
    });
});
