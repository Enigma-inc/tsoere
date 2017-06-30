<div>
   
    <div class="section-body no-margin" id="top">
        <div class="row">
              @foreach($tracks as $track)
                <div class="col-xs-12 col-sm-6 col-md-4 margin-top-40">
                @include('player.multi-track-player') 
                           
                @include('track.partials.track-edit-modals')
                <div class="update-links text-center"> 
                  <a data-toggle="modal" data-target="#Title-edit-{{$track->id}}" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-pencil-square-o"></i> Edit Title</a>
                  <a data-toggle="modal" data-target="#Artwork-edit-{{$track->id}}" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-camera"></i> Change Artwork </a>
                  <track-trash></track-trash>         
                </div>
                </div> 
              @endforeach
        </div>
    </div>
</div>
