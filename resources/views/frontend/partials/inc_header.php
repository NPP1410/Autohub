<base href="<?= htmlspecialchars(url('frontend').'/', ENT_QUOTES, 'UTF-8') ?>">
<?php
if (empty($_title))             $_title = 'Alpha Auto Company';
if (empty($_keywords))         $_keywords = '';
if (empty($_description))     $_description = '';
?>
<title>
    <?php echo $_title; ?>
</title>
<meta name="keywords" content="<?php echo $_keywords; ?>" />
<meta name="description" content="<?php echo $_description; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="noindex, nofollow" />
<meta name='copyright' content='Orange Technology Solution co.,ltd.'>
<meta name='designer' content='Jaturong S.'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta property="og:image" content="<?= htmlspecialchars(asset('frontend-assets/images/logo.png'), ENT_QUOTES, 'UTF-8') ?>" />


<link type="text/css" rel="stylesheet" href="<?= htmlspecialchars(asset('frontend-assets/css/layout.css'), ENT_QUOTES, 'UTF-8') ?>" />
<link type="image/ico" rel="shortcut icon" href="<?= htmlspecialchars(asset('frontend-assets/images/favicon.ico'), ENT_QUOTES, 'UTF-8') ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker-bs5.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
   