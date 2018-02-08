<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('layouts.partials.htmlheader_homepage')
@show

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    @include('layouts.partials.mainheader_homepage')
    @yield('content')
    @include('layouts.partials.footer_homepage')
</div>
@include('layouts.partials.scripts_homepage')
@stack('script')
</body>
</html>