<div>
    <div class="section-body no-margin" id="top">
        <div class="row">
              @foreach($profile->tracks as $track)
                    <div class="col-xs-12 col-sm-6 col-md-4 margin-top-40">
                            @include('player.multi-track-player') 
                    </div>
            @endforeach
        </div>
    </div>
</div>
