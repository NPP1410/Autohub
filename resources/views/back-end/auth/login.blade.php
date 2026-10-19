<!doctype html>
<html lang="th">
<head>
    <base href="{{ url('th') }}">
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>เข้าสู่ระบบ | PipatDev CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet">
    <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/assets/js/plugin.js') }}"></script>
    @include("back-end.auth.style")
</head>

<body>
    <main class="login-page">
        <section class="crm-showcase" aria-label="PipatDev CRM">
            <div class="showcase-glow showcase-glow-one"></div>
            <div class="showcase-glow showcase-glow-two"></div>

            <div class="brand">
                <span class="brand-logo"><img src="{{ asset('logo_pipatdev_white.png') }}" alt="PipatDev"></span>
                <span class="brand-name">PipatDev <b>CRM</b></span>
            </div>
        </section>

        <section class="login-panel">
            <div class="mobile-brand">
                <img src="{{ asset('logo_pipatdev.png') }}" alt="PipatDev">
                <span>PipatDev <b>CRM</b></span>
            </div>

            <div class="login-box">
                <div class="login-heading">
                    <span class="welcome-icon"><i class="bx bx-user"></i></span>
                    <h2>ยินดีต้อนรับกลับมา</h2>
                    <p>เข้าสู่ระบบเพื่อจัดการลูกค้าและทีมขายของคุณ</p>
                </div>

                <form id="frm_cus" action="" method="post" onsubmit="return login_submit();">
                    @csrf

                    <div class="form-group">
                        <label for="username" class="form-label">ชื่อผู้ใช้งาน</label>
                        <div class="field-shell">
                            <span class="field-icon"><i class="bx bx-envelope"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="กรอกชื่อผู้ใช้งานหรืออีเมล" autocomplete="username" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label-row">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <a href="javascript:void(0)" class="form-hint">ลืมรหัสผ่าน?</a>
                        </div>
                        <div class="field-shell">
                            <span class="field-icon"><i class="bx bx-lock-alt"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน" autocomplete="current-password" aria-label="รหัสผ่าน">
                            <button class="password-toggle" type="button" id="password-addon" aria-label="แสดงหรือซ่อนรหัสผ่าน">
                                <i class="mdi mdi-eye-outline"></i>
                            </button>
                        </div>
                    </div>

                    <div class="remember-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-check" name="remember">
                            <label class="form-check-label" for="remember-check">จดจำการเข้าสู่ระบบ</label>
                        </div>
                    </div>

                    <button class="btn btn-login waves-effect waves-light" type="submit" id="login-submit-btn">
                        <span class="btn-text">เข้าสู่ระบบ <i class="bx bx-right-arrow-alt"></i></span>
                        <span class="btn-loading"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังเข้าสู่ระบบ...</span>
                    </button>
                </form>

                <div class="secure-note"><i class="bx bx-shield-quarter"></i> ข้อมูลของคุณได้รับการปกป้องด้วยระบบความปลอดภัย</div>
            </div>

            <div class="login-footer">
                <span>&copy; <script>document.write(new Date().getFullYear())</script> PipatDev CRM</span>
                <span>ต้องการความช่วยเหลือ? <a href="javascript:void(0)">ติดต่อผู้ดูแลระบบ</a></span>
            </div>
        </section>
    </main>

    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    @include("back-end.layout.loading")
    <script>
        var fullUrl = window.location.origin + window.location.pathname;

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        function setLoginLoading(isLoading) {
            var submitButton = $('#login-submit-btn');
            submitButton.toggleClass('is-loading', isLoading).prop('disabled', isLoading);
            if (isLoading) {
                showLoading('กำลังเข้าสู่ระบบ', 'กำลังตรวจสอบบัญชีและสิทธิ์การใช้งาน');
            } else {
                hideLoading();
            }
        }

        $('#password-addon').off('click').on('click', function () {
            var passwordInput = $('#password');
            var icon = $(this).find('i');
            var nextType = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', nextType);
            icon.toggleClass('mdi-eye-outline mdi-eye-off-outline');
        });

        function login_submit() {
            var formData = new FormData($('#frm_cus')[0]);
            var username = $('#username').val().trim();
            var password = $('#password').val().trim();

            if (username === '' || password === '') {
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    text: 'โปรดระบุชื่อผู้ใช้งานและรหัสผ่านก่อนเข้าสู่ระบบ',
                    icon: 'warning', showCancelButton: false,
                    confirmButtonColor: '#2563eb', confirmButtonText: 'ตกลง'
                });
                return false;
            }

            setLoginLoading(true);
            $.ajax({
                type: 'POST', url: fullUrl, data: formData,
                processData: false, contentType: false, dataType: 'json',
                success: function (data) {
                    if (data.result == 'success') {
                        location.href = data.redirect || 'webpanel';
                    } else {
                        setLoginLoading(false);
                        Swal.fire({ title: data.title, text: data.text, icon: 'error', confirmButtonColor: '#2563eb', confirmButtonText: 'ปิด' });
                    }
                },
                error: function (xhr) {
                    setLoginLoading(false);
                    var errorMessage = xhr.responseJSON || { title: 'เกิดข้อผิดพลาด', text: 'ไม่สามารถเข้าสู่ระบบได้ในขณะนี้ กรุณาลองใหม่อีกครั้ง' };
                    Swal.fire({ title: errorMessage.title, text: errorMessage.text, icon: 'error', confirmButtonColor: '#2563eb', confirmButtonText: 'ปิด' });
                }
            });
            return false;
        }
    </script>
</body>
</html>
