{{-- ASLI --}}
{{-- <script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script> --}}

{{-- BY W.S --}}
<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jqueryui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script> --}}

{{-- Form Validation Script --}}
<script type="text/javascript" src="{{ asset('plugins/formvalidation/js/bootstrapValidator.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script>
  $(document).ready(function () {
  	// Setting Locale DatePicker
  	$.fn.datepicker.dates['id'] = {
	    days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
	    daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
	    daysMin: ["Mn", "Sn", "Sl", "Rb", "Km", "Jm", "Sb"],
	    months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
	    monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
	    today: "Hari ini",
	    clear: "Bersih",
	    format: "dd-mm-yyyy",
	    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
	    weekStart: 0
	};
	$(".datepicker3").datepicker({
        autoclose : true,
        format: 'dd-mm-yyyy',
    });
    $('.sidebar-menu').tree()
  })
</script>
{{-- Auto Close Flash Message Dialog --}}
<script type="text/javascript">
	$("#flashmessage").delay(2000).slideUp("fast");
</script>
@stack('script')

