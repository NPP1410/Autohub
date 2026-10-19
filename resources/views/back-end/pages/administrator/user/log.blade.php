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
						<div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <!-- รูปภาพโปรไฟล์ -->
                                        <div class="me-4">
                                            <img src="{{asset("user-icon.png")}}" class="rounded-circle avatar-md" style="width:30px; height:30px;" alt="avatar">
                                        </div>

                                        <!-- ข้อมูลลูกค้า -->
                                        <div class="flex-grow-1">
                                            <div class="row">
                                                <div class="col-sm-4 text-muted">
                                                    <p class="mb-2">ชื่อ</p>
                                                    <p class="mb-2">เบอร์โทรศัพท์</p>
                                                    <p class="mb-2">อีเมล</p>
                                                    <p class="mb-0">หมายเหตุ</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p class="mb-2">{{@$row->firstname.' '.@$row->lastname}}</p>
                                                    <p class="mb-2">{{@$row->phone}}</p>
                                                    <p class="mb-2">{{@$row->email}}</p>
                                                    <p class="mb-0">{{@$row->Role->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
					</div>

					<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title mb-4"><i class="mdi mdi-history me-2 text-primary"></i>ประวัติการเข้าสู่ระบบ</h4>
					
									<div class="table-responsive">
										<table class="table align-middle table-nowrap dt-responsive nowrap w-100 table-check" id="order-list">
											<thead class="table-light">
												<tr class="text-center">
													<th style="width: 5%;">#</th>
													<th>วันที่</th>
													<th>เวลา</th>
													<th>IP Address</th>
													<th>อุปกรณ์</th>
													<th>Browser</th>
													<th>สถานะ</th>
												</tr>
											</thead>
											<tbody>
												@if(@$row->logLogin)
													@forelse (@$row->logLogin as $index => $log)
														<tr class="text-center">
															<td>{{ $index + 1 }}</td>
															<td>{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y') }}</td>
															<td>{{ \Carbon\Carbon::parse($log->created_at)->format('H:i:s') }}</td>
															<td>{{ $log->ip_address }}</td>
															<td>{{ $log->device ?? '-' }}</td>
															<td>{{ $log->browser ?? '-' }}</td>
															<td>
																@if($log->type == 1)
																	<span class="badge bg-success">สำเร็จ</span>
																@else
																	<span class="badge bg-danger">ล้มเหลว</span>
																@endif
															</td>
														</tr>
													@empty
														<tr>
															<td colspan="7" class="text-center text-muted">ไม่มีข้อมูลการเข้าสู่ระบบ</td>
														</tr>
													@endforelse
												@endif
											</tbody>
										</table>
									</div>
					
								</div>
							</div>
						</div>
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
</body>
</html>
