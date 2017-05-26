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
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="theme/css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="theme/css/materialadmin.css" />
		<link type="text/css" rel="stylesheet" href="theme/css/font-awesome.min.css" />
		<link type="text/css" rel="stylesheet" href="theme/css/material-design-iconic-font.min.css" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="theme/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="theme/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		@include('layouts.partials.header')

		<div id="base">

			<div class="offcanvas">
			</div>
			<div id="content">
				@yield('content')
		</div>


	@include('layouts.partials.menubar')


	</div>


	<script src="theme/js/libs/jquery/jquery-1.11.2.min.js"></script>
	<script src="theme/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
	<script src="theme/js/libs/bootstrap/bootstrap.min.js"></script>
	<script src="theme/js/libs/autosize/jquery.autosize.min.js"></script>
	<script src="theme/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
	<script src="theme/js/core/source/App.js"></script>
	<script src="theme/js/core/source/AppNavigation.js"></script>
	<script src="theme/js/core/source/AppOffcanvas.js"></script>
	<script src="theme/js/core/source/AppCard.js"></script>
	<script src="theme/js/core/source/AppNavSearch.js"></script>
	<script src="theme/js/core/source/AppVendor.js"></script>

</body>
</html>
