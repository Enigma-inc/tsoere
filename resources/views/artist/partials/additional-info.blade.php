	<div class="card style-default-light margin-top-30">
							<div class="card-head">
								<ul class="nav nav-tabs tabs-center" data-toggle="tabs">
								    <li class="active"><a href="#booking_contacts">Booking Contacts</a></li>
									<li><a href="#social_links">Social Media Links</a></li>
									<li><a href="#Biography_and_affiliation">Biography and Affiliation</a></li>
									
								</ul>
							</div><!--end .card-head -->
							<div class="card-body tab-content">
								<div class="tab-pane active" id="booking_contacts">
									@if($profile->booking_email!=null)
										<h3 class="text-lg  text-accent margin-0 col-md-6 text-center"> email:  {{$profile->booking_email}}</h3>
									@endif
									@if($profile->booking_phone!=null)
										<h3 class="text-lg  text-accent  margin-0 col-md-6 text-center"> Call:  {{$profile->booking_phone}}</h3>
									@endif
								</div>
								<div class="tab-pane" id="social_links">
									@if($profile->facebook!=null)
										<h3 class="text-lg  margin-0 col-lg-4 text-center"> <a href="{{$profile->facebook}}" class="text-accent" >{{$profile->facebook}}</a></h3>
									@endif
									@if($profile->instagram !=null)
										<h3 class="text-lg   margin-0 col-lg-4 text-center"> <a href="{{$profile->instagram}}" class="text-accent" >{{$profile->instagram}}</a></h3>
									@endif
									@if($profile->twitter!=null)	
										<h3 class="text-lg   margin-0 col-lg-4 text-center"> <a href="{{$profile->twitter}} " class="text-accent" >{{$profile->twitter}}</a></h3>
									@endif
								</div>
							<div class="tab-pane " id="Biography_and_affiliation">
								@if($profile->about != null)		
									<div class="col-lg-6 ">
										<h3 class="text-md text-accent  margin-0 "> Biography:</h3>
										<p class="text-justify text-md text-default-light">{{$profile->about}}</p>
									</div>
								@endif
								@if($profile->affiliation != null)

									<div class="col-lg-6 ">
										<h3 class="text-md text-accent  margin-0 "> Affiliation:</h3>
										<p class="text-justify text-md text-default-light">{{$profile->affiliation}}</p>
									</div>
								@endif
								@if($profile->about == null && $profile->affiliation==null )
									<h3 class="text-default-light text-center">This Artist has not yet added Biography and/or Affiliation</h3>
								@endif	
								</div>
							</div><!--end .card-body -->
							</div>
				