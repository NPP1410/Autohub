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

                <form id="customer-form" action="{{ url("$segment/$folder/add") }}" method="post" novalidate>
                    @csrf
                    <div class="row g-3">
                        <div class="col-xl-8">
                            <div class="card customer-form-card mb-3"><div class="card-body">
                                <div class="customer-section-head"><span class="customer-section-icon"><i class="bx bx-id-card"></i></span><div><h4>ข้อมูลลูกค้า</h4><p>ข้อมูลหลักสำหรับค้นหาและเลือกใช้ในใบเสนอราคา</p></div></div>
                                <div class="row g-3">
                                    <div class="col-md-5"><label class="form-label required" for="customer_type">ประเภทลูกค้า</label><select class="form-select" id="customer_type" name="customer_type" required><option value="company">บริษัท / นิติบุคคล</option><option value="individual">บุคคลธรรมดา</option><option value="government">หน่วยงานราชการ</option><option value="other">อื่น ๆ</option></select></div>
                                    <div class="col-md-7"><label class="form-label required" for="name">ชื่อลูกค้า / ชื่อที่ใช้บนเอกสาร</label><input type="text" class="form-control" id="name" name="name" placeholder="เช่น บริษัท ตัวอย่าง จำกัด" maxlength="255" required autofocus></div>
                                    <div class="col-md-6"><label class="form-label" for="contact_name">ชื่อผู้ติดต่อ</label><input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="ชื่อผู้ประสานงาน"></div>
                                    <div class="col-md-3"><label class="form-label" for="phone">เบอร์โทรศัพท์</label><input type="text" class="form-control" id="phone" name="phone" placeholder="02-000-0000"></div>
                                    <div class="col-md-3"><label class="form-label" for="email">อีเมล</label><input type="email" class="form-control" id="email" name="email" placeholder="contact@example.com"></div>
                                </div>
                            </div></div>

                            <div class="card customer-form-card mb-3"><div class="card-body">
                                <div class="customer-section-head"><span class="customer-section-icon"><i class="bx bx-receipt"></i></span><div><h4>ข้อมูลออกเอกสารและภาษี</h4><p>ข้อมูลส่วนนี้จะถูกนำไปแสดงในใบเสนอราคาและเอกสารทางบัญชี</p></div></div>
                                <div class="row g-3">
                                    <div class="col-md-5"><label class="form-label" for="tax_id">เลขประจำตัวผู้เสียภาษี</label><input type="text" class="form-control" id="tax_id" name="tax_id" placeholder="เลขประจำตัวผู้เสียภาษี 13 หลัก" maxlength="20"></div>
                                    <div class="col-md-3 branch-field"><label class="form-label" for="branch_code">รหัสสาขา</label><input type="text" class="form-control" id="branch_code" name="branch_code" placeholder="00000" maxlength="10"></div>
                                    <div class="col-md-4 branch-field"><label class="form-label" for="branch_name">ชื่อสาขา</label><input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="สำนักงานใหญ่"></div>
                                    <div class="col-12"><label class="form-label" for="address">ที่อยู่สำหรับออกเอกสาร</label><textarea class="form-control" id="address" name="address" placeholder="บ้านเลขที่ อาคาร ถนน ซอย"></textarea></div>
                                    <div class="col-md-3"><label class="form-label" for="subdistrict">แขวง / ตำบล</label><input type="text" class="form-control" id="subdistrict" name="subdistrict"></div>
                                    <div class="col-md-3"><label class="form-label" for="district">เขต / อำเภอ</label><input type="text" class="form-control" id="district" name="district"></div>
                                    <div class="col-md-3"><label class="form-label" for="province">จังหวัด</label><input type="text" class="form-control" id="province" name="province"></div>
                                    <div class="col-md-3"><label class="form-label" for="postal_code">รหัสไปรษณีย์</label><input type="text" class="form-control" id="postal_code" name="postal_code" maxlength="10"></div>
                                </div>
                            </div></div>

                            <div class="card customer-form-card mb-3"><div class="card-body">
                                <div class="customer-section-head"><span class="customer-section-icon"><i class="bx bx-wallet"></i></span><div><h4>เงื่อนไขการค้า</h4><p>ค่าเริ่มต้นเมื่อนำลูกค้าไปสร้างเอกสารขาย</p></div></div>
                                <div class="row g-3">
                                    <div class="col-md-4"><label class="form-label" for="credit_days">เครดิตการค้า (วัน)</label><div class="input-group"><input type="number" class="form-control" id="credit_days" name="credit_days" min="0" max="3650" value="0"><span class="input-group-text">วัน</span></div></div>
                                    <div class="col-md-4"><label class="form-label required" for="isActive">สถานะ</label><select class="form-select" id="isActive" name="isActive"><option value="Y">ใช้งาน</option><option value="N">ปิดใช้งาน</option></select></div>
                                    <div class="col-12"><label class="form-label" for="note">หมายเหตุภายใน</label><textarea class="form-control" id="note" name="note" placeholder="รายละเอียดเพิ่มเติมสำหรับทีมงาน (ไม่แสดงบนใบเสนอราคา)"></textarea></div>
                                </div>
                            </div></div>
                        </div>

                        <div class="col-xl-4"><div class="card customer-form-card customer-side-card"><div class="card-body">
                            <div class="customer-section-head"><span class="customer-section-icon"><i class="bx bx-check-shield"></i></span><div><h4>ความพร้อมของข้อมูล</h4><p>ตรวจสอบก่อนนำไปออกใบเสนอราคา</p></div></div>
                            <div class="customer-code-box"><small>รหัสลูกค้า</small><strong>สร้างอัตโนมัติ</strong></div>
                            <div class="document-checklist">
                                <div class="document-check" data-check="name"><i class="bx bx-check"></i><span>ชื่อลูกค้าสำหรับออกเอกสาร</span></div>
                                <div class="document-check" data-check="address"><i class="bx bx-check"></i><span>ที่อยู่สำหรับออกเอกสาร</span></div>
                                <div class="document-check" data-check="contact"><i class="bx bx-check"></i><span>ข้อมูลสำหรับติดต่อ</span></div>
                                <div class="document-check" data-check="tax"><i class="bx bx-check"></i><span>ข้อมูลภาษี (ถ้ามี)</span></div>
                            </div>
                            <div class="alert alert-primary mt-4 mb-0 py-3" style="font-size:11px;"><i class="bx bx-info-circle me-1"></i> บันทึกลูกค้าไว้ก่อนและกลับมาเติมข้อมูลภายหลังได้</div>
                        </div></div></div>
                    </div>

                    <div class="customer-form-actions"><a href="{{ url("$segment/$folder") }}" class="btn btn-light"><i class="bx bx-x me-1"></i>ยกเลิก</a><button type="submit" class="btn btn-primary px-4"><i class="bx bx-save me-1"></i>สร้างลูกค้า</button></div>
                </form>
            </div>
        </div>
        @include("$prefix.layout.footer")
    </div>
</div>
@include("$prefix.layout.script")
<script>
    function refreshCustomerChecklist() {
        var type = $('#customer_type').val();
        $('[data-check="name"]').toggleClass('is-ready', $.trim($('#name').val()) !== '');
        $('[data-check="address"]').toggleClass('is-ready', $.trim($('#address').val()) !== '');
        $('[data-check="contact"]').toggleClass('is-ready', $.trim($('#contact_name').val()) !== '' || $.trim($('#phone').val()) !== '' || $.trim($('#email').val()) !== '');
        $('[data-check="tax"]').toggleClass('is-ready', $.trim($('#tax_id').val()) !== '' || type === 'individual');
        $('.branch-field').toggle(type === 'company' || type === 'government');
    }
    $('#customer-form').on('input change', 'input, textarea, select', refreshCustomerChecklist);
    refreshCustomerChecklist();
    $('#customer-form').on('submit', function (event) {
        event.preventDefault();
        if (!this.checkValidity()) { this.classList.add('was-validated'); Swal.fire({icon:'warning', title:'กรุณากรอกข้อมูลให้ครบ', text:'โปรดตรวจสอบช่องที่มีเครื่องหมาย *', confirmButtonColor:'#556ee6'}); return; }
        var form = this;
        showLoading('กำลังสร้างลูกค้า', 'กำลังตรวจสอบและจัดเก็บข้อมูล...');
        $.ajax({type:'POST', url:form.action, data:new FormData(form), processData:false, contentType:false, dataType:'json'})
            .done(function (response) { window.location.href = response.redirect; })
            .fail(function (xhr) { hideLoading(); var response = xhr.responseJSON || {title:'เกิดข้อผิดพลาด', text:'ไม่สามารถบันทึกข้อมูลได้'}; Swal.fire({icon:'error', title:response.title, text:response.text, confirmButtonColor:'#556ee6'}); });
    });
</script>
</body>
</html>
