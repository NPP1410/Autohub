<!doctype html>
<html lang="th">
<head>
    @include("$prefix.layout.header")
    @include("$prefix.pages.customer._style")
</head>
<body data-sidebar="dark">
<div id="layout-wrapper">
    @include("$prefix.layout.header-menu")
    @include("$prefix.layout.sidebar")

    <div class="main-content">
        <div class="page-content customer-page">
            <div class="container-fluid">
                @include("$prefix.layout.breadcrumb")

                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-sm-6"><div class="card customer-stat primary mb-0"><div class="card-body"><div><div class="customer-stat-label">ลูกค้าทั้งหมด</div><h3 class="customer-stat-value">{{ number_format($stats['total']) }}</h3></div><span class="customer-stat-icon"><i class="bx bx-group"></i></span></div></div></div>
                    <div class="col-xl-3 col-sm-6"><div class="card customer-stat success mb-0"><div class="card-body"><div><div class="customer-stat-label">พร้อมใช้ออกเอกสาร</div><h3 class="customer-stat-value text-success">{{ number_format($stats['ready']) }}</h3></div><span class="customer-stat-icon"><i class="bx bx-shield-quarter"></i></span></div></div></div>
                    <div class="col-xl-3 col-sm-6"><div class="card customer-stat info mb-0"><div class="card-body"><div><div class="customer-stat-label">บริษัท / หน่วยงาน</div><h3 class="customer-stat-value">{{ number_format($stats['organizations']) }}</h3></div><span class="customer-stat-icon"><i class="bx bx-buildings"></i></span></div></div></div>
                    <div class="col-xl-3 col-sm-6"><div class="card customer-stat warning mb-0"><div class="card-body"><div><div class="customer-stat-label">กำหนดเครดิตการค้า</div><h3 class="customer-stat-value text-warning">{{ number_format($stats['credit']) }}</h3></div><span class="customer-stat-icon"><i class="bx bx-calendar-check"></i></span></div></div></div>
                </div>

                <div class="card customer-filter mb-3">
                    <div class="card-body">
                        <form method="GET" action="{{ url("$segment/$folder") }}">
                            <div class="row g-3 align-items-end">
                                <div class="col-xl-5 col-md-12">
                                    <label class="form-label">ค้นหาทะเบียนลูกค้า</label>
                                    <div class="customer-search"><i class="bx bx-search"></i><input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}" placeholder="รหัส ชื่อลูกค้า เบอร์โทร หรือเลขผู้เสียภาษี" autocomplete="off"></div>
                                </div>
                                <div class="col-xl-2 col-md-4">
                                    <label class="form-label">ประเภทลูกค้า</label>
                                    <select class="form-select" name="customer_type">
                                        <option value="">ทั้งหมด</option>
                                        <option value="company" @selected(request('customer_type') === 'company')>บริษัท / นิติบุคคล</option>
                                        <option value="individual" @selected(request('customer_type') === 'individual')>บุคคลธรรมดา</option>
                                        <option value="government" @selected(request('customer_type') === 'government')>หน่วยงานราชการ</option>
                                        <option value="other" @selected(request('customer_type') === 'other')>อื่น ๆ</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-md-4">
                                    <label class="form-label">สถานะ</label>
                                    <select class="form-select" name="status"><option value="">ทั้งหมด</option><option value="Y" @selected(request('status') === 'Y')>ใช้งาน</option><option value="N" @selected(request('status') === 'N')>ปิดใช้งาน</option></select>
                                </div>
                                <div class="col-xl-3 col-md-4"><div class="d-flex gap-2"><button class="btn btn-primary" type="submit"><i class="bx bx-search me-1"></i>ค้นหา</button><a class="btn btn-light" href="{{ url("$segment/$folder") }}"><i class="bx bx-reset me-1"></i>ล้าง</a></div></div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(Helper::canAdd('customer'))
                    <div class="mb-3"><a href="{{ url("$segment/$folder/add") }}" class="btn btn-success"><i class="bx bx-user-plus me-1"></i> เปิดรหัสลูกค้าใหม่</a></div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
                            <div><h4 class="customer-table-title">ทะเบียนลูกค้า</h4><p class="customer-table-subtitle">ข้อมูลกลางสำหรับใบเสนอราคา ใบส่งของ และเอกสารรับชำระ</p></div>
                            <span class="text-muted small">ทั้งหมด {{ number_format($items->total()) }} รายการ</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table customer-table align-middle mb-0">
                                <thead class="table-light"><tr><th class="text-center">#</th><th>รหัสลูกค้า</th><th>ชื่อลูกค้า</th><th>ประเภท</th><th>ข้อมูลภาษี</th><th>ผู้ติดต่อ</th><th>เบอร์โทร / อีเมล</th><th class="text-center">เครดิต</th><th class="text-center">สถานะ</th><th class="text-center">จัดการ</th></tr></thead>
                                <tbody>
                                @forelse($items as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ $items->pages->start + $index + 1 }}</td>
                                        <td><span class="customer-code">{{ $item->code }}</span></td>
                                        <td><div class="customer-name">{{ $item->name }}</div>@if($item->branch_name)<div class="customer-contact">{{ $item->branch_name }}</div>@endif</td>
                                        <td>{{ $item->type_label }}</td>
                                        <td>{{ $item->tax_id ?: 'ไม่ระบุเลขผู้เสียภาษี' }}</td>
                                        <td>{{ $item->contact_name ?: '-' }}</td>
                                        <td><div>{{ $item->phone ?: '-' }}</div>@if($item->email)<div class="customer-contact">{{ $item->email }}</div>@endif</td>
                                        <td class="text-center"><strong>{{ number_format($item->credit_days) }}</strong> วัน</td>
                                        <td class="text-center"><span class="badge {{ Helper::canEdit('customer') ? 'customer-status' : '' }} {{ $item->isActive === 'Y' ? 'bg-success' : 'bg-secondary' }}" @if(Helper::canEdit('customer')) data-id="{{ $item->id }}" @endif>{{ $item->isActive === 'Y' ? 'ใช้งาน' : 'ปิดใช้งาน' }}</span></td>
                                        <td class="text-center"><div class="d-inline-flex gap-1">
                                            @if(Helper::canEdit('customer'))<a href="{{ url("$segment/$folder/edit/$item->id") }}" class="customer-action text-primary" title="แก้ไข"><i class="bx bx-pencil"></i></a>@endif
                                            @if(Helper::canDelete('customer'))<button type="button" class="customer-action text-danger border-0" onclick="deleteCustomer({{ $item->id }})" title="ลบ"><i class="bx bx-trash"></i></button>@endif
                                        </div></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="10" class="customer-empty"><i class="bx bx-user-x"></i>ยังไม่มีข้อมูลลูกค้าที่ตรงกับการค้นหา</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        @include("$prefix.layout.table-footer")
                    </div>
                </div>
            </div>
        </div>
        @include("$prefix.layout.footer")
    </div>
</div>

@include("$prefix.layout.script")
<script>
    $('.customer-status').on('click', function () {
        var badge = $(this);
        showLoading('กำลังเปลี่ยนสถานะ', 'กรุณารอสักครู่...');
        $.post("{{ url("$segment/$folder/status") }}/" + badge.data('id'), {_token: '{{ csrf_token() }}'})
            .done(function () { location.reload(); })
            .fail(function () { hideLoading(); Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถเปลี่ยนสถานะได้', 'error'); });
    });

    function deleteCustomer(id) {
        Swal.fire({title: 'ยืนยันการลบลูกค้า?', text: 'ข้อมูลจะไม่แสดงในทะเบียนลูกค้า', icon: 'warning', showCancelButton: true, confirmButtonColor: '#f46a6a', confirmButtonText: 'ลบข้อมูล', cancelButtonText: 'ยกเลิก'}).then(function (result) {
            if (!result.isConfirmed) return;
            showLoading('กำลังลบข้อมูล', 'กรุณารอสักครู่...');
            $.post("{{ url("$segment/$folder/destroy") }}/" + id, {_token: '{{ csrf_token() }}'})
                .done(function () { location.reload(); })
                .fail(function () { hideLoading(); Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถลบข้อมูลลูกค้าได้', 'error'); });
        });
    }
</script>
</body>
</html>
