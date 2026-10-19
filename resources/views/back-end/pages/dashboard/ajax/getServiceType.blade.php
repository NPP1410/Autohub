    <div class="modal-header">
        <h5 class="modal-title">
            <i class="bx bx-wallet me-1 text-success"></i> รายการจ่ายยา/ผลิตภัณฑ์คลินิก
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-xl-8">
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h4 class="card-title mb-1">ข้อมูล "การรับบริการ/อาการวันนี้"</h4>
                                <p class="text-muted mb-0">กรุณากรอกช่องที่มี <span class="text-danger">*</span> ให้ครบถ้วน</p>
                            </div>
                        </div>
                        <hr class="my-3">
                        <h6 class="text-uppercase text-muted mb-3"><i class="bx bx-id-card me-1"></i> ข้อมูลการเข้ารับบริการ</h6>
                        <div class="mb-3 row">
                            <label for="order_code" class="col-md-4 col-form-label required">รับบริการ</label>
                            <div class="col-md-8 col-12">
                                <select name="service_type" id="service_type" class="form-select" disabled>
                                    <option value="0">-- เลือกประเภทการรับบริการ --</option>
                                    <option value="1" @if($data->service_type == 1) selected @endif>มาตรวจ</option>
                                    <option value="2" @if($data->service_type == 2) selected @endif>มา Follow up อาการ</option>
                                    <option value="3" @if($data->service_type == 3) selected @endif>รับวัคซีน</option>
                                    <option value="4" @if($data->service_type == 4) selected @endif>มาซื้อ - กลับบ้าน</option>
                                </select>
                                <small class="text-muted">เลือกประเภทการมารับบริการของคนไข้ในวันนี้</small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label required">อาการ / วัคซีนวันนี้</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="today_symptom" name="today_symptom" disabled value="{{@$data->today_symptom}}" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label required">ต้องการใบรับรองแพทย์หรือไม่</label>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="medical_certificate_required" id="medical_certificate_yes" disabled value="1">
                                    <label class="form-check-label" for="medical_certificate_yes">ต้องการ</label>
                                </div>
                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="medical_certificate_required" id="medical_certificate_no" disabled value="0" checked>
                                    <label class="form-check-label" for="medical_certificate_no">ไม่ต้องการ </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row" hidden>
                            <label class="col-md-4 col-form-label required">วันที่นัดหมาย</label>
                            <div class="col-md-8">
                                <input class="form-control" type="date" id="appointment_date" name="appointment_date" placeholder="" disabled value="{{date('Y-m-d',strtotime(@$data->appointment_date))}}">
                            </div>
                        </div>

                        <div class="mb-3 row" hidden>
                            <label class="col-md-4 col-form-label required">เวลานัดหมาย</label>
                            <div class="col-md-8">
                                <input class="form-control" type="time" id="appointment_time" name="appointment_time" placeholder="" disabled value="{{date('H:i',strtotime(@$data->appointment_time))}}">
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-3"><i class="bx bx-id-card me-1"></i> กรอกค่าการวัดพื้นฐาน</h6>
                        
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label required">น้ำหนัก (กก.)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="weight_kg" id="weight_kg" disabled value="{{@$data->weight_kg}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label required">ส่วนสูง (ซม.)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="height_cm" id="height_cm" disabled value="{{@$data->height_cm}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">รอบศีรษะ (ซม.)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="head_circumference_cm" id="head_circumference_cm" disabled value="{{@$data->head_circumference_cm}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">อุณหภูมิ (°C)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="temperature_c" id="temperature_c" disabled value="{{@$data->temperature_c}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">°C</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">ชีพจร (bpm)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="pulse_bpm" id="pulse_bpm" disabled value="{{@$data->pulse_bpm}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">bpm</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">RR - การหายใจ (ครั้ง/นาที)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="rr_bpm" id="rr_bpm" disabled value="{{@$data->rr_bpm}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">/min</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">SpO2</label>
                            <div class="col-md-8">
                                <div class="input-group"> 
                                    <input type="number" class="form-control" name="spo2_percent" id="spo2_percent" disabled value="{{@$data->spo2_percent}}" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label required">หมายเหตุ</label>
                            <div class="col-md-8">
                               <textarea class="form-control" name="note" id="note" rows="3" disabled placeholder="หมายเหตุเพิ่มเติม เช่น กินยาลดไข้ก่อนมา/น้องรอในรถเมื่อใกล้ถึงคิวให้โทรตาม ฯลฯ">{{@$data->note}}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-body">

                        <h6 class="text-uppercase text-muted mb-3">
                            <i class="bx bx-child mr-1"></i> ข้อมูลเด็ก
                        </h6>

                        <table class="table table-sm table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="text-muted" style="width:40%;">ชื่อ-นามสกุล</th>
                                    <td class="font-weight-bold">{{@$customer->name}}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">ชื่อเล่น</th>
                                    <td>น้อง{{@$customer->nickname}}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">อายุ</th>
                                    <td>{{Helper::age(@$customer->birthday)}}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">เพศ</th>
                                    <td> {{Helper::gender(@$customer->gender)}}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">กรุ๊ปเลือด</th>
                                    <td>{{@$customer->blood_group}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
        ปิด
    </button>
</div>

