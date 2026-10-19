<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

<script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@include("$prefix.layout.loading")

<div class="modal modal_01 fade" id="modal01" tabindex="-1" aria-labelledby="modal01Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="show_modal_01"></div>
        </div>
    </div>
</div>

<div class="modal modal_02 fade" tabindex="-1" aria-labelledby="modal01Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="show_modal_02"></div>
        </div>
    </div>
</div>

<div class="modal modal_03 fade" tabindex="-1" aria-labelledby="modal01Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="show_modal_03"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.select2').select2();

    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }

</script>


<script>
(function () {
  const KEY = 'ui_font_scale';     // เก็บค่าปรับขนาด
  const MIN = 0.85;               // เล็กสุด 85%
  const MAX = 1.30;               // ใหญ่สุด 130%
  const STEP = 0.05;              // เพิ่ม/ลดครั้งละ 5%
  function clamp(n, min, max){ return Math.max(min, Math.min(max, n)); }
  function apply(scale){
    document.documentElement.style.fontSize = (16 * scale) + 'px';
    document.documentElement.setAttribute('data-font-scale', scale.toFixed(2));
  }
  function getScale(){
    const saved = parseFloat(localStorage.getItem(KEY));
    return isNaN(saved) ? 1 : saved;
  }
  function setScale(scale){
    scale = clamp(scale, MIN, MAX);
    localStorage.setItem(KEY, scale);
    apply(scale);
  }
  apply(getScale());
  document.addEventListener('click', function(e){
    if(e.target.id === 'fontInc')  setScale(getScale() + STEP);
    if(e.target.id === 'fontDec')  setScale(getScale() - STEP);
    if(e.target.id === 'fontReset') setScale(1);
  });
})();
</script>
