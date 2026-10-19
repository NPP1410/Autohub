<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/i18n/jquery.ui.datepicker-th.min.js"></script>
<script>
$(function () {
  $.datepicker.setDefaults($.datepicker.regional['th']);
  const pad2 = (n) => String(n).padStart(2,'0');
  function weekdayThaiFromYMD(ymd){
    if(!ymd) return '';
    const [y,m,d] = ymd.split('-').map(Number);
    const dt = new Date(Date.UTC(y, m-1, d, 12, 0, 0));
    return new Intl.DateTimeFormat('th-TH', { weekday:'long', timeZone:'Asia/Bangkok' }).format(dt);
  }
  function ymdToThai(ymd){
    if(!ymd) return '';
    const [y,m,d] = ymd.split('-').map(Number);
    return `${pad2(d)}/${pad2(m)}/${y + 543}`;
  }

  function ymdToDate(ymd){
    const [y,m,d] = ymd.split('-').map(Number);
    return new Date(y, m-1, d);
  }

  function fixBuddhistYear(){
    setTimeout(function(){
      const $dp = $('#ui-datepicker-div');
      if(!$dp.length) return;

      $dp.find('select.ui-datepicker-year option').each(function(){
        const y = parseInt(this.value, 10);
        if(!isNaN(y)) $(this).text(y + 543);
      });

      const $year = $dp.find('.ui-datepicker-year');
      if($year.length && $year.is('span')){
        const y = parseInt($year.text(), 10);
        if(!isNaN(y) && y < 2400) $year.text(y + 543);
      }
    }, 0);
  }

  function initThaiDate($wrap){
    const $display = $wrap.find('.js-date-display');
    const $real    = $wrap.find('.js-date-real');
    const $picker  = $wrap.find('.js-date-picker');
    const $weekday = $wrap.find('.js-date-weekday');

    const defaultYMD = $wrap.data('default') || (new Date().toISOString().slice(0,10));

    const initYMD = $real.val();
    $real.val(initYMD);
    $display.val(ymdToThai(initYMD));
    if($weekday.length) $weekday.text(weekdayThaiFromYMD(initYMD));

    $picker.datepicker({
      dateFormat: 'dd/mm/yy',
      changeMonth: true,
      changeYear: true,
      yearRange: 'c-80:c+20',
      showButtonPanel: true,
      beforeShow: fixBuddhistYear,
      onChangeMonthYear: fixBuddhistYear,
      onSelect: function(dateText){
        const [dd, mm, yyyy] = dateText.split('/').map(Number);

        const ymd = `${yyyy}-${pad2(mm)}-${pad2(dd)}`;
        $real.val(ymd);

        $display.val(`${pad2(dd)}/${pad2(mm)}/${yyyy + 543}`);
        if($weekday.length) $weekday.text(weekdayThaiFromYMD(ymd));

        if ($real.attr('id') === 'birthday') {
          calculateAgeFromYMD(ymd);
        }

        fixBuddhistYear();
      }
    });

    $display.on('click', function(){
      const ymd = $real.val() || defaultYMD;
      $picker.datepicker('setDate', ymdToDate(ymd));
      $picker.datepicker('show');
      fixBuddhistYear();
    });
  }

  $('.js-thai-date').each(function(){initThaiDate($(this));});

});



</script>
