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
						<div class="col-12">
							<div class="card">
								<div class="card-body">

									<div class="row mb-2">
										<form method="GET" action="" class="row align-items-end">
											<div class="col-sm-4">
												<div class="search-box me-2 mb-2 d-inline-block w-100">
													<div class="position-relative">
														<input type="text" class="form-control" autocomplete="off" id="searchTableList" name="keyword" placeholder="ค้นหาตาม ระดับสิทธิ์" value="{{ request()->get('keyword') }}">
														<i class="bx bx-search-alt search-icon"></i>
													</div>
												</div>
											</div>
										
											<div class="col-sm-2">
												<button type="submit" class="btn btn-primary mb-2">
													<i class="bx bx-search"></i> ค้นหา
												</button>
											</div>
										</form>
									</div>

									<div class="row mb-2">
										<div class="col-sm-12">
											<div class="text-sm-end">
												<a href="{{ url("$segment/$folder/add") }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 addOrder-modal"><i class="mdi mdi-plus me-1"></i> Add New</a>
											</div>
										</div><!-- end col-->
									</div>
									<div class="hidden md:block mx-auto text-slate-500"><b>Showing {{$items->currentPage()}} to {{$items->total()}} of {{$items->total()}} entries</b></div>
									<div class="table-responsive">
										<table class="table align-middle table-nowrap dt-responsive nowrap w-100 table-check" id="order-list">
											<thead class="table-light">
												<tr>
													<th style="width:5%;" class="text-center">#</th>
													<th style="width:20%;" class="text-left">ระดับสิทธิ์</th>
													<th style="width:10%;" class="text-center">วันที่สร้าง</th>
													<th style="width:10%;" class="text-center">วันที่แก้ไข</th>
													<th style="width:10%;" class="text-center">สถานะ</th>
													<th style="width:10%;" class="text-center">จัดการ</th>
												</tr>
											</thead>
											<tbody>
												@if (@$items->count() > 0)
													@foreach (@$items as $index => $item)
														<tr>
															<td class="text-center"> {{ $items->pages->start+$index + 1 }}</td>
															<td>{{$item->name}}</td>
															<td class="text-center">{{ date('d/m/Y, H:i',strtotime($item->created_at)) }}</td>
															<td class="text-center">{{ date('d/m/Y, H:i',strtotime($item->updated_at)) }}</td>
															<td class="text-center">
																{!!Helper::isActive(@$item->isActive)!!}
															</td>
															
															<td class="text-center">
																<a href="{{ url("$segment/$folder/edit/$item->id") }}" class="text-success edit-list" data-edit-id="12"><i class="mdi mdi-pencil font-size-18"></i></a>
																{{-- <a href="javascript:void(0);" onclick="deleteItem({{$item->id}})" class="text-danger remove-list" data-remove-id="12"><i class="mdi mdi-delete font-size-18"></i></a> --}}
															</td>
														</tr>
													@endforeach
												@else
													<tr>
														<td colspan="7" class="text-center">- No items -</td>
													</tr>
												@endif
											</tbody>
										</table>
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
</body>

</html>
