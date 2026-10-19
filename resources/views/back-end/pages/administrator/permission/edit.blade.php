<!doctype html>
<html lang="en">

<head>
    @include("$prefix.layout.header")
    <style>
        .permission-toggle-btn {
            border: 0;
            background: transparent;
            color: #495057;
            padding: 0;
            margin-right: 8px;
            line-height: 1;
        }

        .permission-toggle-btn .toggle-icon {
            display: inline-block;
            transition: transform .2s ease;
        }

        .permission-toggle-btn[aria-expanded="true"] .toggle-icon {
            transform: rotate(90deg);
        }

        .secondary-menu-label {
            padding-left: 44px !important;
        }

        .secondary-menu-key {
            padding-left: 24px !important;
            color: #6c757d;
        }

        .secondary-menu-index {
            padding-left: 18px !important;
            color: #6c757d;
        }
    </style>
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
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">ข้อมูล "ระดับสิทธิ์"</h4>
                                        <p class="card-title-desc">กรุณากรอกข้อมูลที่มี <span class="text-danger">*</span> ให้ครบถ้วนเพื่อให้ระบบสามารถบันทึกข้อมูลได้</p>
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="name" class="form-label">ชื่อ</label>
                                                <input type="text" id="name" name="name" class="form-control" value="{{@$row->name}}" placeholder="กรุณากรอกข้อมูลระดับสิทธิ์" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="detail" class="form-label">รายละเอียดสิทธิ์</label>
                                                <input type="text" id="detail" name="detail" class="form-control" value="{{@$row->detail}}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="isActive" class="form-label">สถานะการใช้งาน</label>
                                                    <select name="isActive" id="isActive" class="form-select">
                                                        <option value="Y" @if(@$row->isActive == "Y") selected @endif>เปิดใช้งาน</option>
                                                        <option value="N" @if(@$row->isActive == "N") selected @endif>ปิดใช้งาน</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2 class="font-medium text-base mr-auto">
                                                <i class="fa fa-cog text-danger"></i>  Permission Setting
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <table class="table">
                                            <!-- หัวตาราง -->
                                            <thead style="background-color: #e8ecef;">
                                                <tr>
                                                    <th style="width:5%;" class="text-center text-black">#</th>
                                                    <th style="width:30%;" class="text-left text-black">Menu</th>
                                                    <th style="width:20%;" class="text-left text-black">Menu Key</th>
                                                    <th style="width:11%;" class="text-left text-black">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input checkbox-all" type="checkbox" data-target=".view" />
                                                        </div>
                                                        View
                                                    </th>
                                                    <th style="width:11%;" class="text-left text-black">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input checkbox-all" type="checkbox" data-target=".create" />
                                                        </div>
                                                        Create
                                                    </th>
                                                    <th style="width:11%;" class="text-left text-black">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input checkbox-all" type="checkbox" data-target=".edit" />
                                                        </div>
                                                        Edit
                                                    </th>
                                                    <th style="width:12%;" class="text-left text-black">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input checkbox-all" type="checkbox" data-target=".delete" />
                                                        </div>
                                                        Delete
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if(@$menus)
                                                    @foreach(@$menus as $index=>$m)
                                                        @if($m->position === 'topic')
                                                        <tr class="permission-row" data-menu-type="{{ $m->menu_type ?: 'administrative' }}">
                                                            <td class="text-center text-black" style="background-color:#cfd8e3;">{{$index+1}}</td>
                                                            <td class="text-black fw-bold" style="background-color:#cfd8e3;">
                                                                <i class="bx bx-folder-open me-1"></i> {{$m->name}}
                                                            </td>
                                                            <td class="text-black" style="background-color:#cfd8e3;">
                                                                {{ $m->menu_key ?: '-' }}
                                                            </td>
                                                            <td colspan="4" style="background-color:#cfd8e3;"></td>
                                                        </tr>
                                                        @continue
                                                        @endif

                                                        @php
                                                        $second = \App\Models\Backend\MenuModel::where('_id',$m->id)->where('status','on')->get();
                                                        $role_main = \App\Models\Backend\Role_listModel::findByRoleAndMenu($row->id, $m);
                                                        $hasSecondary = count(@$second) > 0;
                                                        @endphp
                                                        <tr class="permission-row" data-menu-type="{{ $m->menu_type ?: 'administrative' }}">
                                                            <td class="text-center text-black">{{$index+1}}</td>
                                                            <td class="text-black">
                                                                @if($hasSecondary)
                                                                    <button type="button"
                                                                        class="permission-toggle-btn"
                                                                        data-target="secondary-group-{{ $m->id }}"
                                                                        aria-expanded="true"
                                                                        title="เปิด/ปิดเมนูย่อย">
                                                                        <i class="bx bx-chevron-right toggle-icon"></i>
                                                                    </button>
                                                                @endif
                                                                @if(!empty($m->icon))
                                                                    <i class="{{ $m->icon }} me-1"></i>
                                                                @endif
                                                                {{$m->name}}
                                                                @if($hasSecondary)
                                                                    <span class="text-muted">({{ count($second) }})</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-black">
                                                                {{ $m->menu_key ?: '-' }}
                                                                <input name="menus[{{$m->id}}][menu_key]" value="{{$m->menu_key}}" hidden>
                                                            </td>

                                                            @if(count(@$second) == null)
                                                            <td>
                                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input view" type="checkbox" @if(@$role_main->read == "on") checked @endif name="menus[{{$m->id}}][read]" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input create" type="checkbox" @if(@$role_main->add == "on") checked @endif name="menus[{{$m->id}}][add]" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input edit" type="checkbox" @if(@$role_main->edit == "on") checked @endif name="menus[{{$m->id}}][edit]" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input delete" type="checkbox" @if(@$role_main->delete == "on") checked @endif name="menus[{{$m->id}}][delete]" />
                                                                </div>
                                                            </td>
                                                            @endif

                                                            @if(count(@$second) != null)
                                                            <td colspan="4"></td>
                                                            @endif

                                                        </tr>
                                                        @if(count(@$second))
                                                            @foreach(@$second as $i => $s)
                                                            @php
                                                            $role_sub = \App\Models\Backend\Role_listModel::findByRoleAndMenu($row->id, $s);
                                                            @endphp
                                                            <tr class="permission-row secondary-row secondary-group-{{ $m->id }}" data-menu-type="{{ $s->menu_type ?: ($m->menu_type ?: 'administrative') }}">
                                                                <td class="text-center text-black secondary-menu-index">{{($index+1).".".$i+1}}</td>
                                                                <td class="text-black secondary-menu-label">
                                                                    <i class="bx bx-subdirectory-right me-1 text-muted"></i>{{$s->name}}
                                                                </td>
                                                                <td class="text-black secondary-menu-key"> {{ $s->menu_key ?: '-' }}</td>
                                                                <td>
                                                                    <input name="menus[{{$s->id}}][menu_key]" value="{{$s->menu_key}}" hidden>
                                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input view" type="checkbox" @if(@$role_sub->read == "on") checked @endif name="menus[{{$s->id}}][read]" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input create" type="checkbox" @if(@$role_sub->add == "on") checked @endif name="menus[{{$s->id}}][add]" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input edit" type="checkbox" @if(@$role_sub->edit == "on") checked @endif name="menus[{{$s->id}}][edit]" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                        <input class="form-check-input delete" type="checkbox" @if(@$role_sub->delete == "on") checked @endif name="menus[{{$s->id}}][delete]" />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12 text-end">
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
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.checkbox-all').forEach(function (checkboxAll) {
                checkboxAll.addEventListener('change', function () {
                    const targetSelector = this.dataset.target;
                    const targetCheckboxes = Array.from(document.querySelectorAll(targetSelector)).filter(function (checkbox) {
                        const row = checkbox.closest('tr');
                        return row && row.style.display !== 'none';
                    });
                    targetCheckboxes.forEach(function (checkbox) {
                        checkbox.checked = checkboxAll.checked;
                    });
                });
            });

            document.querySelectorAll('.permission-toggle-btn').forEach(function (toggleButton) {
                toggleButton.addEventListener('click', function () {
                    const targetClass = this.dataset.target;
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    const targetRows = document.querySelectorAll('.' + targetClass);

                    targetRows.forEach(function (row) {
                        row.style.display = expanded ? 'none' : '';
                    });

                    this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                });
            });
        });
    </script>
	<script>
      
        function check_add() {
			var formData = new FormData($("#form_submit")[0]);
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
						url: "{{"$segment/$folder/edit/$row->id"}}",
						data: formData,
						processData: false,
						contentType: false,
						dataType: 'json',
						success: function(data) {
                            hideLoading();
                            location.reload();
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
