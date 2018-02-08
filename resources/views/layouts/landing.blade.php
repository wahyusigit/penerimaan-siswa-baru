<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
@section('htmlheader')
    @include('layouts.partials.htmlheader_landing')
@show

<body class="skin-black layout-top-nav" data-spy="scroll" data-target="#navigation" data-offset="50">

<div class="wrapper">
    <!-- Fixed navbar -->
    <header class="main-header">
    	@include('layouts.partials.mainheader_landing')	
    </header>
    
    <div class="content-wrapper">
	    <div class="container-fluid">
	    	<section class="content-header"></section>
	      	<section class="content">
	      		@yield('main-content')
			</section>
	      <!-- /.content -->
	    </div>
	    <!-- /.container -->
  	</div>
    @include('layouts.partials.footer')
</div>


@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>



