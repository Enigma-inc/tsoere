				<div class="profile">
					<div class="style-primary-dark header-container ">
						<div class="avatar-container">
								<img class="img-circle border-white border-xl img-responsive avatar" src="{{Storage::url(Auth::user()->profile->avatar)}}" alt="Profile Image">
                        </div>
						<div class="contents">
						<div class="artist-name">
							<h3 class="text-xxl  text-default-bright text-shadow margin-0">{{Auth::user()->profile->name}}</h3>      
						
						</div>
							                        

						</div>
						
					</div>
					<div class="actions">
				                 <a href = "{{route('artist.avatar-update')}}" class="btn btn-accent btn-xs btn-flat " role="button" aria-pressed="true">
								  <i class="fa fa-camera"></i> update profile picture
								 </a>
							</div>  

				</div>


