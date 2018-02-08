<hr>
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			<h4 class="text-red">Mohon Tidak Menghilangkan / Merusak Bukti Ini (Terutama Pada Barcode)</h4>
			<h5 class="text-red">Bukti Ini Terdapat Barcode, Tidak Memerlukan Tanda Tangan</h5>
		</div>
		{{-- <img src="{{ asset('img/footer.jpg') }}" class="img-responsive"> --}}
	</div>
</div>

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print-md.css') }}">
<style type="text/css">
	@media print {
	h3 {
	    font-size: 20px;
	}
	h4 {
		font-size: 18px;
	}
	}
</style>
@endpush
@push('script')
<script type="text/javascript">
	
$( document ).ready(function() {
    window.onload = function() { window.print(); }
    // setTimeout(function () { window.print(); }, 500);
    // window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
});
	
</script>
@endpush