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
						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-body">
									<form method="GET" action="">
										<div class="row g-3 align-items-end">

											<!-- Search -->
											<div class="col-md-5">
												<label class="form-label text-muted small">ค้นหาข้อมูล</label>
												<div class="position-relative">
													<input type="text"
														class="form-control ps-5"
														autocomplete="off"
														id="searchTableList"
														name="keyword"
														placeholder="ค้นหาตาม ชื่อ-สกุล"
														value="{{ request()->get('keyword') }}">
													<i class="bx bx-search position-absolute"
													style="left:15px; top:50%; transform:translateY(-50%); font-size:18px; color:#6c757d;"></i>
												</div>
											</div>

											<!-- Role -->
											<div class="col-md-3">
												<label class="form-label text-muted small">ตำแหน่ง</label>
												<select class="form-select" id="role" name="role">
													<option value="">ตำแหน่งทั้งหมด</option>
													@if(@$roles)
														@foreach(@$roles as $item)
															<option value="{{ $item->id }}"
																{{ $item->id == Request::get('role') ? 'selected' : '' }}>
																{{ $item->name }}
															</option>
														@endforeach
													@endif
												</select>
											</div>

											<!-- Buttons -->
											<div class="col-md-4">
												<div class="d-flex gap-2">
													<button type="submit" class="btn btn-primary">
														<i class="bx bx-search"></i> ค้นหา
													</button>

													<a href="{{ url()->current() }}" class="btn btn-light">
														<i class="bx bx-reset"></i> ล้างค่า
													</a>
												</div>
											</div>

										</div>
									</form>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">

									<div class="row mb-2">
										<div class="col-sm-12">
											<div class="text-sm-end">
												<a href="{{ url("$segment/$folder/add") }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 addOrder-modal"><i class="mdi mdi-plus me-1"></i> เพิ่มผู้ใช้งาน</a>
											</div>
										</div><!-- end col-->
									</div>
									<div class="hidden md:block mx-auto text-slate-500"><b>Showing {{$items->currentPage()}} to {{$items->total()}} of {{$items->total()}} entries</b></div>
									<div class="table-responsive">
										<table class="table align-middle table-nowrap dt-responsive nowrap w-100 table-check" id="order-list">
											<thead class="table-light">
												<tr>
													<th style="width:5%;" class="text-center">#</th>
													<th style="width:15%;" class="text-left">ชื่อ-สกุล</th>
													<th style="width:10%;" class="text-left">ชื่อเล่น</th>
													<th style="width:15%;" class="text-left">ชื่อผู้ใช้งาน</th>
													<th style="width:10%;" class="text-center">ตำแหน่ง</th>
													<th style="width:10%;" class="text-left">เบอร์โทรติดต่อ</th>
													<th style="width:4%;" class="text-center">สถานะ</th>
													<th style="width:3%;" class="text-center">จัดการ</th>
												</tr>
											</thead>
											<tbody>
												@if (@$items->count() > 0)
													@foreach (@$items as $index => $item)
														<tr>
															<td class="text-center"> {{ $items->pages->start+$index + 1 }}</td>
															<td>{{$item->fullname()}}</td>
															<td>{{@$item->nickname}}</td>
															<td>{{$item->email}}</td>
															<td>{{ $item->roleNames() }}</td>
															<td>
																{{ preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $item->phone) }}
															</td>
															<td class="text-center">{!!Helper::isActive(@$item->isActive)!!}</td>
															<td class="text-center">
																<a href="{{ url("$segment/$folder/edit/$item->id") }}" class="text-success edit-list" data-edit-id="{{ $item->id }}" title="แก้ไขข้อมูล">
																	 <i class="mdi mdi-pencil font-size-18"></i>
																 </a>
																<a href="javascript:void(0);" onclick="deleteItem({{$item->id}})" class="text-danger remove-list" title="ลบข้อมูล">
																	<i class="mdi mdi-delete font-size-18"></i>
																</a>
															</td>
														</tr>
													@endforeach
												@else
													<tr>
														<td colspan="10" class="text-center py-5">
															<div class="text-muted">
																<i class="bx bx-search-alt" style="font-size:40px;"></i>
																<div class="mt-2">ไม่พบข้อมูล</div>
															</div>
														</td>
													</tr>
												@endif
											</tbody>
										</table>
										@include("$prefix.layout.table-footer")
									</div>
									<!-- end table responsive -->
								</div>
								<!-- end card body -->
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
        function deleteItem(id) {
            Swal.fire({
                title: 'ยืนยันการลบข้อมูล?',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ลบข้อมูล',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (!result.isConfirmed) {
                    return;
                }
				loadingSwal();
                $.ajax({
                    url: "{{ url("$segment/$folder/destroy") }}/" + id,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function () {
                        location.reload();
                    },
                    error: function () {
                        hideLoading();
                        Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถลบข้อมูลนี้ได้', 'error');
                    }
                });
            });
        }
    </script>
</body>

</html>
