

<div class="card card-bordered style-primary-dark margin-top-20">

	<div class="col-lg-4">
		<div class="card-head">
			<header class="text-default-bright text-shaddow">Booking Contacts and social media links</header>
		</div><!--end .card-head -->
		<div class="card-body padding-top-0">
				<div class="col-md-6">
				@if($profile->booking_email!=null)
					<p class="text-default-light  text-left"> email:  {{$profile->booking_email}}</p>
				@endif
				@if($profile->booking_phone!=null)
					<p class="text-default-light text-left"> Call:  {{$profile->booking_phone}}</p>
				@endif
				</div>
				<div class="col-md-6">
				@if($profile->facebook!=null)
					<p class="text-left"> <a href="{{$profile->facebook}}" class="text-default-light" >{{$profile->facebook}}</a></p>
				@endif
				@if($profile->instagram !=null)
					<p class="text-left"> <a href="{{$profile->instagram}}" class="text-default-light" >{{$profile->instagram}}</a></p>
				@endif
				@if($profile->twitter!=null)	
					<p class="text-left"> <a href="{{$profile->twitter}} " class="text-default-light" >{{$profile->twitter}}</a></p>
				@endif
				</div>
		</div><!--end .card-body -->
	
	</div>
	<div class="col-lg-4">
			<div class="card-head">
				<header class="text-default-bright text-shaddow">Biography</header>
			</div><!--end .card-head -->
			<div class="card-body padding-top-0">
				@if($profile->about != null)		
			
						<h4 class="text-justify text-md text-default-light">{{$profile->about}}</h4>
					
				@endif
			</div><!--end .card-body -->
		
	</div>
	<div class="col-lg-4">
		<div class="card-head">
			<header class="text-default-bright text-shaddow">Affiliation</header>
		</div><!--end .card-head -->
		<div class="card-body padding-top-0">
			@if($profile->affiliation != null)		
					<h4 class="text-justify text-md text-default-light">{{$profile->affiliation}}</h4>
			@endif
		</div><!--end .card-body -->
	
	</div>	
	</div>