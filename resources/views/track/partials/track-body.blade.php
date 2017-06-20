<section>
   <div class="section-header margin-top-40 margin-bottom-40">
        <h1 class="page-header text-primary">{{$category -> name}}</h1>
    </div>
    <div class="section-body no-margin" id="top">
        <div class="row">
              @foreach($tracks as $track)
                <div class="col-xs-12 col-sm-6 col-md-4">                  
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body" >
                        
                            <div class="artwork" style="background-image: url('{{$track->artwork}}');">
                                <div id="play-button-{{$track->id}}" class="play-button " data-gearPath="{{url($track->json)}}" >
                                        <a href="#top"><i class="fa fa-play-circle-o"></i></a>
                                    </div>
                            </div>
                            <div class="details">
                            
                                <div class="header">
                                    <div class="artist-name text-primary text-bold ">{{$track->artist->name}}</div>                            
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