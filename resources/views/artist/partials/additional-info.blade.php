	<div class="card style-default-light margin-top-30">
							<div class="card-head">
								<ul class="nav nav-tabs tabs-center" data-toggle="tabs">
								    <li class="active"><a href="#social_links">Social Media Links</a></li>	
									<li><a href="#Biography_and_affiliation">Biography and Affiliation</a></li>
									<li ><a href="#booking_contacts">Booking Contacts</a></li>
									
								</ul>
							</div><!--end .card-head -->
							<div class="card-body tab-content">
								<div class="tab-pane active" id="booking_contacts">
									@if($profile->booking_email!=null)
										<p class="text-lg  text-default-dark margin-0 col-md-6 text-center"> email:  {{$profile->booking_email}}</p>
									@endif
									@if($profile->booking_phone!=null)
										<p class="text-lg  text-default-dark  margin-0 col-md-6 text-center"> Call:  {{$profile->booking_phone}}</p>
									@endif
								</div>
								<div class="tab-pane" id="social_links">
									@if($profile->facebook!=null)
										<p class="text-lg  margin-0 col-lg-4 text-center"> <a href="{{$profile->facebook}}" class="text-default-dark" >{{$profile->facebook}}</a></p>
									@endif
									@if($profile->instagram !=null)
										<p class="text-lg   margin-0 col-lg-4 text-center"> <a href="{{$profile->instagram}}" class="text-default-dark" >{{$profile->instagram}}</a></p>
									@endif
									@if($profile->twitter!=null)	
										<p class="text-lg   margin-0 col-lg-4 text-center"> <a href="{{$profile->twitter}} " class="text-default-dark" >{{$profile->twitter}}</a></p>
									@endif
								</div>
							<div class="tab-pane " id="Biography_and_affiliation">
								@if($profile->about != null)		
									<div class="col-lg-6 ">
										<h4 class="text-md text-accent  margin-0 "> Biography:</h4>
										<p class="text-justify text-md text-default-dark">{{$profile->about}}</p>
									</div>
								@endif
								@if($profile->affiliation != null)

									<div class="col-lg-6 ">
										<h4 class="text-md text-accent  margin-0 "> Affiliation:</h4>
										<p class="text-justify text-md text-default-dark">{{$profile->affiliation}}</p>
									</div>
								@endif
								@if($profile->about == null && $profile->affiliation==null )
									<h4 class="text-accent text-center">This Artist has not yet added Biography and/or Affiliation</h4>
								@endif	
								</div>
							</div><!--end .card-body -->
					</div>
				