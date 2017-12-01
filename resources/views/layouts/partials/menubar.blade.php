	<div id="menubar" class=" menubar-inverse ">
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
					@foreach($genres as $menuItem)
						<li>
						<a href="{{route('track.category', $menuItem->slug)}}" >
							<div class="gui-icon">
							  <i class="{{'md icon-'.$menuItem->slug}}"></i>
							</div>
							<span class="title margin-left-60">{{$menuItem->name}}</span>
						</a>
					</li>
					@endforeach
				


				</ul>

				<div class="menubar-foot-panel stick-bottom-left-right">
					<small class="no-linebreak hidden-folded">
						<span class="opacity-75">Copyright &copy; 2017</span> <strong>Musicbox</strong>
					</small>
				</div>
			</div>
		</div>