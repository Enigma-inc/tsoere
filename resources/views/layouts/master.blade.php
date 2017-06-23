<!DOCTYPE html>
<html lang="en">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# music: http://ogp.me/ns/music#">
  <title>Musicbox</title>

  		<!--meta property="og:type"   content="music.song" /> 
  		<meta property="og:url"    content="" /> 
  		<meta property="og:title"  content="Sample Song" /> 
  		<meta property="og:image"  content="https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png" /--> 

		      <!-- Open Graph data -->
    	<meta property="og:title" content="title of the song" />
    	<meta property="og:type" content="music.song" />
    	<meta property="og:url" content="http://" /> <!--The canonical URL of your song.-->
    	<meta property="og:image" content=""/>	<!-- An image URL which should represent your song within the graph (likely the album art). The image must be at least 50px by 50px (though minimum 200px by 200px is preferred) and have a maximum aspect ratio of 3:1. We support PNG, JPEG and GIF formats-->
		<meta property="og:music:musician" content=""/>
		<meta property="og:site_name" content=""/> <!--a human readable name of your site-->
		<meta property="og:audio" content="http://"/>  <!--url to play this song-->
		<meta property="og:audio:type" content="audio/vnd.facebook.bridge"/>

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
</body>




</html>
