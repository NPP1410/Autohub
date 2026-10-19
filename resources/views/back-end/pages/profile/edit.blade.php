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
					<div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">ข้อมูล "รายการผู้ใช้งานระบบ"</h4>
                                    <p class="card-title-desc">กรุณากรอกข้อมูลที่มี <span class="text-danger">*</span> ให้ครบถ้วนเพื่อให้ระบบสามารถบันทึกข้อมูลได้</p>
                                    <form id="form_submit" class="needs-validation">
                                    @csrf

                                        {{-- <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label">รูปภาพ</label>
                                            <div class="col-md-6 col-12">
                                                <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                                @if(@$row->image)
                                                <a href="{{url("$row->image")}}" data-lightbox="order-{{ $row->id }}">
                                                    <img id="preview-image" src="{{asset(@$row->image)}}" alt="Preview" style="max-height: 200px;" class="rounded shadow-sm border"/>
                                                </a>
                                                @else
                                                <img id="preview-image" src="#" alt="Preview" style="display: none; max-height: 200px;" class="rounded shadow-sm border"/>
                                                @endif
                                            </div>
                                        </div> --}}

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">ชื่อ</label>
                                            <div class="col-md-6 col-12">
                                                <input class="form-control" type="text" id="firstname" name="firstname" placeholder="กรุณากรอกข้อมูลชื่อ" value="{{@$row->firstname}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">นามสกุล</label>
                                            <div class="col-md-6 col-12">
                                                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="กรุณากรอกข้อมูลนามสกุล" value="{{@$row->lastname}}"/>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label required">เบอร์โทร</label>
                                            <div class="col-md-6 col-12">
                                                <input type="text" id="phone" name="phone" onkeypress="return chkNumber(event)" value="{{@$row->phone}}" class="form-control" placeholder="กรุณากรอกเบอร์โทร" />
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label">อีเมล (ใช้สำหรับเข้าสู่ระบบ)</label>
                                            <div class="col-md-6 col-12">
                                                <input type="text" id="email" name="email" class="form-control" value="{{@$row->email}}" disabled placeholder="กรุณากรอกอีเมล" />
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label">รหัสผ่าน</label>
                                            <div class="col-md-6 col-12">
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="order_code" class="col-md-4 col-form-label">ยืนยันรหัสผ่าน</label>
                                            <div class="col-md-6 col-12">
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="กรุณากรอกรหัสผ่าน" aria-label="Confirm_password" aria-describedby="confirm_password_addon">
                                                    <button class="btn btn-light" type="button" id="confirm_password_addon"><i id="show_confirm_password" class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
											<div class="col-md-12 text-end">
                                                <a href="javascript:void(0)" onclick="check_add();" class="btn btn-primary waves-effect waves-light">บันทึก</a>
                                                <a href="{{url("$segment/$folder")}}" class="btn btn-secondary waves-effect">ยกเลิก</a>
											</div>
										</div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
						<!-- end col -->
					</div>
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
			if(firstname == "" || lastname == "" || phone == ""){
				Swal.fire({
					icon: 'warning',
					title: "เกิดข้อผิดพลาด",
					html: "กรุณากรอกข้อมูลที่มี <span class='text-danger'>*</span> ให้ครบถ้วน !",
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
						url: "{{"$segment/$folder"}}",
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
