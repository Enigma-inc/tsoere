	<div id="menubar" class=" ">
			<div class="menubar-fixed-panel">
				<div>
					<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
						<i class="fa fa-bars"></i>
					</a>
				</div>
				<div class="expanded">
					<a href="{{route('home')}}">
						<img class="logo margin-left-15" src="{{url('images/logo.png')}}" alt="Musicbox">
					</a>
				</div>
			</div>
			<div class="menubar-scroll-panel">

				<ul id="main-menu" class="gui-controls">

					<li>
						<a href="{{route('home')}}" >
							<div class="gui-icon"><i class="md md-home text-primary"></i></div>
							<span class="title">Home</span>
						</a>
					</li>
					<!--li>
						<a href="../../html/dashboards/dashboard.html" >
							<div class="gui-icon"><i class="fa fa-line-chart text-primary"></i></div>
							<span class="title">Trending</span>
						</a>
					</li>
					<li-->
						<!--a href="../../html/dashboards/dashboard.html" >
							<div class="gui-icon"><i class="fa fa-plus-square-o text-primary"></i></div>
							<span class="title">Recently Added</span>
						</a>
					</li-->
					
					<li>
						<a href="{{route('track.category', ['slug' => 'hip-hop'])}}" >
							<div class="gui-icon"><i class="fa fa-headphones text-primary"></i></div>
							<span class="title">Hip Hop</span>
						</a>
					</li>
					
					<li>
						<a href="{{route('track.category', ['slug' => 'poetry'])}}" >
							<div class="gui-icon"><i class="fa fa-microphone text-primary"></i></div>
							<span class="title">Poetry</span>
						</a>
					</li>
					
					<li>
						<a href="{{route('track.category', ['slug' => 'afro-jazz'])}}" >
							<div class="gui-icon"><i class="md md-queue-music text-primary"></i></div>
							<span class="title">Afro Jazz</span>
						</a>
					</li>

					<li>
						<a href="{{route('track.category', ['slug' => 'reggae'])}}" >
							<div class="gui-icon"><i class="glyphicon glyphicon-music text-primary"></i></div>
							<span class="title">Reggae</span>
						</a>
					</li>

					


				</ul>

				<div class="menubar-foot-panel">
					<small class="no-linebreak hidden-folded">
						<span class="opacity-75">Copyright &copy; 2017</span> <strong>Musicbox</strong>
					</small>
				</div>
			</div>
		</div>