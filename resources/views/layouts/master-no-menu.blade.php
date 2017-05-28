<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Admin - Login</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    @include('layouts.partials.common-css')
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
</head>

<body class="menubar-hoverable header-fixed ">

<section class="section-account">
<div class="img-backdrop" style="background-image: url('{{url('theme/images/img16.jpg')}}')"></div>
    @yield('content')
</section>
    <!-- BEGIN JAVASCRIPT -->
    @include('layouts.partials.common-scripts')
    <!-- END JAVASCRIPT -->

</body>

</html>
