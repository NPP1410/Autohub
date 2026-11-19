<?php
$frontendAlert = null;
if (isset($errors) && $errors->any()) {
    $frontendAlert = ['icon' => 'error', 'titleText' => 'กรุณาตรวจสอบข้อมูล', 'text' => implode("\n", $errors->all())];
} elseif (session('frontend.status')) {
    $frontendAlert = ['icon' => session('frontend.status_icon', 'info'), 'titleText' => 'Alpha Auto', 'text' => session('frontend.status')];
}
?>
<script src="<?= htmlspecialchars(asset('frontend-assets/js/sweetalert2.all.min.js'), ENT_QUOTES, 'UTF-8') ?>"></script>
<script>
window.frontendAlert = function (text, icon = 'info') {
    if (window.Swal) return Swal.fire({icon: icon, titleText: 'Alpha Auto', text: String(text), confirmButtonText: 'ตกลง', confirmButtonColor: '#ff4b32'});
    window.alert(String(text));
    return Promise.resolve({isConfirmed: true});
};
document.addEventListener('DOMContentLoaded', function () {
    const feedback = <?= json_encode($frontendAlert, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) ?>;
    if (feedback && window.Swal) {
        document.querySelectorAll('[data-frontend-feedback]').forEach(el => el.hidden = true);
        Swal.fire(Object.assign({confirmButtonText: 'ตกลง', confirmButtonColor: '#ff4b32'}, feedback));
    } else if (feedback && !document.querySelector('[data-frontend-feedback]')) {
        const notice = document.createElement('div');
        notice.className = 'alert alert-info';
        notice.setAttribute('role', 'status');
        notice.textContent = feedback.text;
        document.querySelector('main')?.prepend(notice);
    }
    document.querySelectorAll('form[action$="logout.php"]').forEach(form => {
        form.addEventListener('submit', async function (event) {
            if (!window.Swal) return;
            event.preventDefault();
            const result = await Swal.fire({icon: 'question', titleText: 'ต้องการออกจากระบบหรือไม่?', showCancelButton: true, confirmButtonText: 'ออกจากระบบ', cancelButtonText: 'ยกเลิก', confirmButtonColor: '#ff4b32'});
            if (result.isConfirmed) HTMLFormElement.prototype.submit.call(form);
        });
    });
});
</script>