<section>
    <div class="section-header margin-top-50">
    </div>
    <div class="section-body no-margin">
        <div class="row">
            <div class="col-md-3">
                  @foreach($profile->tracks as $track)
                    <div class="card card-bordered style-default track-card">
                        <div class="card-body">
                            <img src="{{url($track->artwork)}}" width="100%" alt="">
                            <div class="details">
                                <h2 class="title">{{$track->title}}</h2>
                                <div class="controls">
                                <div class="left-controls" >Test</div>
                                    <div class="play" >
                                                <i class="fa fa-play-circle fa-3x text-primary"></i>
                                     </div>
                                      <div class="right-controls" >test</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>

        </div>
    </div>
</section>