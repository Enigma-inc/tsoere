<ul class="header-nav header-nav-options margin-top-5">
						<li>
							<!-- Search form -->
							<form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search text-primary"></i></button>
							</form>
						</li>
					</ul><!--end .header-nav-options -->
                      @if (Auth::guest())
						<ul class="header-nav header-nav-options nav navbar-nav navbar-right">

							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
						</ul>
                    @else
                    <ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="{{Storage::url(Auth::user()->profile->avatar)}}" >
								<span class="profile-info">
									 {{ Auth::user()->profile->name }} 
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li><a href="{{route('profile')}}">My profile</a></li>
								<li class="divider"></li>
								<li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off text-danger"></i> 
                                        Logout
                                </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                  </form>
                                </li>
							</ul>
						</li>
					</ul>
                    @endif