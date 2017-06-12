<section class="full-bleed profile">
					<div class="section-body style-default-dark header-bg force-padding text-shadow header-container ">
						<div class="overlay  stick-top-left height-3"></div>
						<div class="row">
							<div class="col-xs-12">
                            <div class="avatar-container">
<<<<<<< HEAD
								<img class="img-circle border-white border-xl img-responsive avatar" src="{{Storage::url(Auth::user()->profile->avatar)}}" alt="Profile Image">
								<h3 class="artist-name">{{$profile->name}}</h3>                                
                            </div>
=======
								<img  href="/update-avatar" src="{{Storage::url(Auth::user()->profile->avatar)}}"class="img-circle border-white border-xl img-responsive avatar"  alt="Profile Image">
								<h3 class="artist-name">{{Auth::user()->profile->name}}</h3>
						 	</div>
>>>>>>> d56d08636fcaaaa92c9e62c0d55be5ff544c59b1
							</div>
							
						</div>
						
					</div>

				<a href = "/update-avatar" class="btn btn-primary btn-sm active " role="button" aria-pressed="true">update profile picture</a>

</section>
