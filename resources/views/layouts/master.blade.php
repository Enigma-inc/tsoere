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
	
<body class="menubar-hoverable header-fixed menubar-first full-content">
<div class="stage" >

		@include('layouts.partials.header')

	<div id="base" >
		

			<div class="offcanvas">
			</div>
			<div id="content"  >
				<section class="has-actions">
						<div class="section-body">
							@yield('content')
						
						</div>
						<div class="section-action style-default">
						<div class="section-action-row">
							@yield('footer')
						</div>
						<div class="section-floating-action-row">
						 @if (Auth::guest())
						 <a class="btn ink-reaction  btn-xs btn-accent upload-btn-footer" href="{{route('register')}}" >
								<i class="glyphicon glyphicon-user"></i>
								Create Your Profile
							</a>
						 @else
							<a class="btn ink-reaction  btn-xs btn-accent upload-btn-footer" href="{{route('track.create')}}" >
								<i class="fa fa-upload"></i>
								Upload 
							</a>
							@endif
						</div>
					</div>
				</section>
			</div>
		


	@include('layouts.partials.menubar')


	</div>
	

	@include('layouts.partials.common-scripts')
	@yield('page-scripts')
	</div>
	<div class="gearWrap "> <div id="gearContainer" class="gear" data-gear="./player/json/setup.json"></div> </div>
</body>




</html>
