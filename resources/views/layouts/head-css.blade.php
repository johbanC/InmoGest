@yield('css')

<!-- Bootstrap Css -->
<link href="{{URL::asset('assets/scss/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{URL::asset('assets/scss/icons.min.css')}}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{URL::asset('assets/scss/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

@vite(['resources/scss/app.scss', 'resources/js/app.js'])