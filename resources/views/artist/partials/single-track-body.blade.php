<section>
    <div class="section-header margin-top-20">
    </div>
    <div class="section-body no-margin" id ="top">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3  col-md-6 col-md-offset-3">
                      @if($track)            
                <div class="card card-bordered style-default-dark single-track-card">
                    <div class="card-body">
                        <div class="artwork" style="background-image: url('{{url($track->artwork)}}');">
                            <div id="play-button-{{$track->id}}" class="play-button " data-gearPath="{{url($track->json)}}" >
                                <a href="#top"><i class="fa fa-play-circle-o"></i></a>
                            </div>
                        </div>
                        <div class="details">
                            <div class="header">
                                <div class="artist-name text-primary text-bold">{{$profile->name}}</div>
                                <div class="track-title">{{$track->title}}</div>
                            </div>
                            <track-actions :track="{{$track}}"></track-actions>
                        </div>
                    </div>
                </div>
                @else
                <div><h3>Track Not Found</h3></div>
                @endif
                
            </div>

        </div>
    </div>
</section>
<section>
    <div class="page-header margin-10 padding-bottom-10">
    <ol class="breadcrumb"><li class="active">Other Tracks By {{ $profile->name}}</li></ol>
    </div>
    <div class="section-body no-margin" id="top">

        <div class="row">
              @foreach($relatedTracks as $track)
                <div class="col-xs-12 col-sm-6 col-md-4">                  
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body">
                            <div class="artwork" style="background-image: url('{{url($track->artwork)}}');">
                                <div id="play-button-{{$track->id}}" class="play-button " data-gearPath="{{url($track->json)}}" >
                                        <a href="#top"><i class="fa fa-play-circle-o"></i></a>
                                    </div>
                            </div>
                            <div class="details">
                                <div class="header">
                                    <div class="artist-name text-primary text-bold">{{$profile->name}}</div>                            
                                    <div class="track-title">{{$track->title}}</div>
                                </div>
                                 <track-actions :track="{{$track}}"></track-actions>
                                  </div>
                                </div>
                            </div>
                        </div>
                    
                @endforeach
        </div>
    </div>
</section>