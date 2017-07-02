<div>
   
    <div class="section-body no-margin" id="top">
      <div class="card style-default-light margin-top-30">
									<div class="card-head">
										<ul class="nav nav-tabs tabs-center" data-toggle="tabs">
											<li class="active">
                          <a href="#list">
                            <i class="fa fa-music "></i> Published
                          </a>
                      </li>
											<li><a href="#trashed">
                         <i class="fa fa-trash "></i> Trashed
                      </a></li>
										</ul>
									</div><!--end .card-head -->
									<div class="card-body tab-content padding-0">
										<div class="tab-pane active" id="list">
                      @if($tracks->count()> 0)
                          @foreach($tracks as $track)
                          <div class="col-xs-12 col-sm-6 col-md-4 margin-top-40">
                          @include('player.multi-track-player') 
                                    
                          @include('track.partials.track-edit-modals')
                          <track-admin-actions :track="{{$track}}"></track-admin-actions>                   
                          </div> 
                        @endforeach
                      @else
                         <div class="text-center margin-top-50">
                         <p class="lead">It looks like you have no song/poem here.</p>
                         <p class="lead">Why don't you <a href="{{route('track.create')}}" class="text-accent ">upload</a> one</p>
                         </div>
                      @endif

										</div>
										<div class="tab-pane" id="trashed">
                     @if($trashed->count() >0)
                         @foreach($trashed as $track)
                          <div class="col-xs-12 col-sm-6 col-md-4 margin-top-40">
                          @include('player.multi-track-player') 
                                    
                            <track-admin-actions :track="{{$track}}"></track-admin-actions>
                          @include('track.partials.track-edit-modals')                            
                            
                        
                          </div> 
                        @endforeach

                       @else
                         <div class="text-center margin-top-50">
                         <p class="lead"> <i class="fa fa-trash-o fa-2x"></i> Trash Empty</p>
                         </div>
                      @endif
										</div>
									</div><!--end .card-body -->
								</div>  
           
        </div>
    </div>
</div>
