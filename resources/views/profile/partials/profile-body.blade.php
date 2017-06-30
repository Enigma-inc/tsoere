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
                     @foreach($tracks as $track)
                          <div class="col-xs-12 col-sm-6 col-md-4 margin-top-40">
                          @include('player.multi-track-player') 
                                    
                          @include('track.partials.track-edit-modals')
                          <div class="update-links text-center"> 
                            <a data-toggle="modal" data-target="#Title-edit-{{$track->id}}" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-pencil-square-o"></i> Edit Title</a>
                            <a data-toggle="modal" data-target="#Artwork-edit-{{$track->id}}" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-camera"></i> Change Artwork </a>
                          <track-trash :track-id="{{$track->id}}"></track-trash>                   
                          </div>
                          </div> 
                        @endforeach
										</div>
										<div class="tab-pane" id="trashed">
                        @foreach($trashed as $track)
                          <div class="col-xs-12 col-sm-6 col-md-4 margin-top-40">
                          @include('player.multi-track-player') 
                                    
                          @include('track.partials.track-edit-modals')
                          <div class="update-links text-center"> 
                            <a data-toggle="modal" data-target="#Title-edit-{{$track->id}}" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-pencil-square-o"></i> Edit Title</a>
                            <a data-toggle="modal" data-target="#Artwork-edit-{{$track->id}}" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-camera"></i> Change Artwork </a>
                          <track-untrash :track-id="{{$track->id}}"></track-untrash>                   
                          </div>
                          </div> 
                        @endforeach
										</div>
									</div><!--end .card-body -->
								</div>  
           
        </div>
    </div>
</div>
