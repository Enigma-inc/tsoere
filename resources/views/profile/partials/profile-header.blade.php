<section class="full-bleed profile">
					<div class="section-body style-default-dark header-bg force-padding text-shadow header-container ">
						<div class="overlay  stick-top-left height-3"></div>
						<div class="row">
							<div class="col-xs-12">
                            <div class="avatar-container">
								<img class="img-circle border-white border-xl img-responsive avatar" src="{{Storage::url(Auth::user()->profile->avatar)}}" alt="Profile Image">
								<h3 class="artist-name">{{Auth::user()->profile->name}}</h3>                                
                            </div>
							</div>
						</div>
					</div><!--end .section-body -->
</section>