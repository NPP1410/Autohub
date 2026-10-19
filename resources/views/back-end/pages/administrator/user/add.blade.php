<!doctype html>
<html lang="en">

<head>
    @include("$prefix.layout.header")
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include("$prefix.layout.header-menu")
        <!-- ========== Left Sidebar Start ========== -->
        @include("$prefix.layout.sidebar")
        <!-- Left Sidebar End -->

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start breadcrumb -->
                    @include("$prefix.layout.breadcrumb")
                    <!-- start breadcrumb -->


                    {{-- START:CONTENT --}}
                    <form id="form_submit" class="needs-validation">
                    @csrf
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3" style="width:42px;height:42px;background:rgba(52,195,143,.12);color:#34c38f;">
                                                <i class="mdi mdi-account-plus-outline font-size-22"></i>
                                            </span>
                                            <div>
                                                <h4 class="mb-1">เพิ่มผู้ใช้งาน</h4>
                                                <p class="text-muted mb-0">กรอกข้อมูลผู้ใช้งานและกำหนดสิทธิ์การเข้าใช้งานระบบ</p>
                                            </div>
                                        </div>
                                        <h4 class="card-title">ข้อมูลเข้าสู่ระบบ</h4>
                                        <p class="card-title-desc">ใช้สำหรับเข้าสู่ระบบของผู้ใช้งาน</p>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">อีเมล (ใช้สำหรับเข้าสู่ระบบ)</label>
                                            <div class="col-md-8 col-12">
                                                <input type="text" id="email" name="email" class="form-control" placeholder="กรุณากรอกอีเมล" />
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">รหัสผ่าน</label>
                                            <div class="col-md-8 col-12">
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">ยืนยันรหัสผ่าน</label>
                                            <div class="col-md-8 col-12">
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="กรุณากรอกรหัสผ่าน" aria-label="Confirm_password" aria-describedby="confirm_password_addon">
                                                    <button class="btn btn-light" type="button" id="confirm_password_addon"><i id="show_confirm_password" class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">สถานะ</label>
                                            <div class="col-md-8 col-12">
                                                <select name="isActive" id="isActive" class="form-select select2">
                                                    <option value="Y">เปิดใช้งาน</option>
                                                    <option value="N">ปิดใช้งาน</option>
                                                </select>
                                            </div>
                                        </div>

                                        <hr class="my-4">
                                        <h4 class="card-title">ข้อมูลส่วนตัว</h4>
                                        <p class="card-title-desc">กรุณากรอกข้อมูลพื้นฐานของผู้ใช้งาน</p>
                                      
                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label">รูปภาพ</label>
                                            <div class="col-md-8 col-12">
                                                <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                                <img id="preview-image" src="#" alt="Preview" style="display: none; max-height: 200px;" class="rounded shadow-sm border"/>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">ชื่อ-สกุล</label>
                                            <div class="col-md-4 col-6">
                                                <input class="form-control" type="text" id="firstname" name="firstname" placeholder="กรุณากรอกข้อมูลชื่อ">
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="กรุณากรอกข้อมูลนามสกุล" />
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">เบอร์โทร</label>
                                            <div class="col-md-8 col-12">
                                                <input type="text" id="phone" name="phone" onkeypress="return chkNumber(event)" class="form-control" placeholder="กรุณากรอกเบอร์โทร" />
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">ตำแหน่ง</label>
                                            <div class="col-md-8 col-12">
                                                <select name="role" id="role" class="form-select select2">
                                                    <option value="">กรุณาเลือกตำแหน่ง</option>
                                                    @if(@$roles)
                                                        @foreach (@$roles as $item)
                                                            <option value="{{@$item->id}}">{{@$item->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-md-8 text-end">
                                <a href="javascript:void(0)" onclick="check_add();" class="btn btn-primary waves-effect waves-light">บันทึก</a>
                                <a href="{{url("$segment/$folder")}}" class="btn btn-secondary waves-effect">ยกเลิก</a>
                            </div>
                        </div>
                    </form>
                    {{-- END:CONTENT --}}


					


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            @include("$prefix.layout.footer")
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include("$prefix.layout.script")

	<script>
        $('#phone')
            .attr({
                inputmode: 'numeric',
                pattern: '0[0-9]{9}',
                maxlength: 10,
                placeholder: '0XXXXXXXXX'
            })
            .closest('.row')
            .find('label')
            .removeClass('required');

        const enhanceUserFormLayout = function () {
            const iconStyle = 'width:34px;height:34px;background:rgba(85,110,230,.12);color:#556ee6;';
            const $sectionTitles = $('#form_submit .card-title');

            $sectionTitles.eq(0)
                .addClass('d-flex align-items-center gap-2 mb-1')
                .prepend('<span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="' + iconStyle + '"><i class="mdi mdi-shield-account-outline font-size-18"></i></span>');

            $sectionTitles.eq(1)
                .addClass('d-flex align-items-center gap-2 mb-1 mt-1')
                .prepend('<span class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="' + iconStyle + '"><i class="mdi mdi-account-circle-outline font-size-18"></i></span>');
        };

        enhanceUserFormLayout();

        document.getElementById('image').addEventListener('change', function (event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        });
        
        $('#confirm_password_addon').click(function() {
			var confirm_password = $('#confirm_password').attr('type');
			if (confirm_password == "password") {
				$('#confirm_password').attr('type', 'text');
                
			} else {
				$('#confirm_password').attr('type', 'password');
			}
		});

        function check_add() {
			var formData = new FormData($("#form_submit")[0]);
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var phone = $('#phone').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var confirm_password = $('#confirm_password').val();
			var lastname = $('#lastname').val();
			if(firstname == "" || lastname == "" || email == "" || password == "" || confirm_password == ""){
				Swal.fire({
					icon: 'warning',
					title: "เกิดข้อผิดพลาด",
					html: "กรุณากรอกข้อมูลที่มี <span class='text-danger'>*</span> ให้ครบถ้วน !",
					showCancelButton: false,
					confirmButtonText: 'Close',
				});
				return false;
			}
            if (password != confirm_password) {
				Swal.fire({
					icon: 'warning',
					title: "เกิดข้อผิดพลาด",
					text: "กรุณากรอกรหัสผ่าน และรหัสผ่านยืนยัน ให้ตรงกัน !",
					showCancelButton: false,
					confirmButtonText: 'Close',
				});
				return false;
			}
			if(phone != "" && !/^0[0-9]{9}$/.test(phone)){
				Swal.fire({
					icon: 'warning',
					title: "เกิดข้อผิดพลาด",
					text: "กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง เช่น 0812345678",
					showCancelButton: false,
					confirmButtonText: 'Close',
				});
				return false;
			}
			Swal.fire({
				icon: 'warning',
				html: 'กรุณากด <b>ยืนยัน</b/> รายการเพื่อดำเนินการต่อ',
				showCancelButton: true,
				confirmButtonText: 'ยืนยัน',
				cancelButtonText: `ยกเลิก`,
			}).then((result) => {
				if (result.isConfirmed) {
                    loadingSwal();
					$.ajax({
						type: 'POST',
						url: "{{"$segment/$folder/add"}}",
						data: formData,
						processData: false,
						contentType: false,
						dataType: 'json',
						success: function(data) {
                            location.href = "{{"$segment/$folder"}}";
						},
						error:function(xhr){
                            hideLoading();
							const errorMessage = xhr.responseJSON;
							Swal.fire({
								title: "" + errorMessage.title,
								text: "" + errorMessage.text,
								icon: 'error',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'ปิด',
								customClass: {
									confirmButton: 'btn btn-danger waves-effect waves-light'
								},
							});
						}
					});
				}
			});
		}
	</script>
</body>

</html>
