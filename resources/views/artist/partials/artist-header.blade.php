				<div class="profile">
					<div class="style-primary-dark header-container ">
						<div class="avatar-container">
								<img class="img-circle border-white border-xl img-responsive avatar" src="{{Storage::url($profile->avatar)}}" alt="Profile Image">
                        </div>
					<div class="contents">
						<div class="artist-name">
							<h3 class="text-xxl  text-default-bright text-shadow margin-0">{{$profile->name}}</h3>      
						</div>
					 </div>
						
					</div>
					@include('artist.partials.additional-info') 
				</div>


