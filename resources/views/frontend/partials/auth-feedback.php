<?php if (isset($errors) && $errors->any()): ?>
    <div data-frontend-feedback class="alert alert-danger" role="alert"><?= htmlspecialchars($errors->first(), ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<?php if (session('frontend.status')): ?>
    <div data-frontend-feedback class="alert alert-info" role="status"><?= htmlspecialchars(session('frontend.status'), ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
