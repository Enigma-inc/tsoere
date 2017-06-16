<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Musicbox</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		    <!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		@include('layouts.partials.common-css')
		<link href="https://fonts.googleapis.com/css?family=El+Messiri:400,500,600,700" rel="stylesheet">
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="theme/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="theme/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->

		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	
<body class="menubar-hoverable header-fixed">
<div class="stage" >

		@include('layouts.partials.header')

	<div id="base" >
		

			<div class="offcanvas">
			</div>
			<div id="content" >
				@yield('content')
			</div>
		


	@include('layouts.partials.menubar')


	</div>
	

	@include('layouts.partials.common-scripts')
	@yield('page-scripts')
	</div>
	@yield('player-setup')
</body>




</html>
