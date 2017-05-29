<!DOCTYPE html>
<html lang="en">

<head>
    <title>Musicbox</title>

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
@php
    $images=array("image-1.jpg","image-2.jpg","image-3.jpg","image-4.jpg","image-5.jpg");
    shuffle($images);
    $path='theme/images/'. $images[0];
@endphp
<body class="menubar-hoverable header-fixed  img-backdrop" style="background-image: url('{{ url($path)}}')">
<section class="section-account" style="height:100%;display:flex;align-items:center; justify-content: center;">
    <div style="flex:1">
    @yield('content')
    </div>
</section>
    <!-- BEGIN JAVASCRIPT -->
    @include('layouts.partials.common-scripts')
    <!-- END JAVASCRIPT -->

</body>

</html>
