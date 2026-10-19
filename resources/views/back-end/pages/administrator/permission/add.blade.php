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
                                    <h4 class="card-title">ข้อมูล "ระดับสิทธิ์"</h4>
                                    <p class="card-title-desc">กรุณากรอกข้อมูลที่มี <span class="text-danger">*</span> ให้ครบถ้วนเพื่อให้ระบบสามารถบันทึกข้อมูลได้</p>
                                    <form id="form_submit" class="needs-validation">
                                    @csrf
                                        
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label for="name" class="form-label">ชื่อ</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="กรุณากรอกข้อมูลระดับสิทธิ์" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="detail" class="form-label">รายละเอียดสิทธิ์</label>
                                                <input type="text" id="detail" name="detail" class="form-control" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">สถานะการใช้งาน</label>
                                                    <select name="isActive" id="isActive" class="form-select">
                                                        <option value="Y">เปิดใช้งาน</option>
                                                        <option value="N">ปิดใช้งาน</option>
                                                    </select>
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
        function check_add() {
			var formData = new FormData($("#form_submit")[0]);
			var name = $('#name').val();
			if(name == ""){
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
						url: "{{"$segment/$folder/add"}}",
						data: formData,
						processData: false,
						contentType: false,
						dataType: 'json',
						success: function(data) {
                            hideLoading();
                            location.href = "{{"$segment/$folder"}}";
						},
						error:function(xhr){
                            hideLoading();
							const errorMessage = xhr.responseJSON || {
                                title: 'ไม่สามารถบันทึกข้อมูลได้',
                                text: xhr.responseText || 'กรุณาลองใหม่อีกครั้ง'
                            };
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
