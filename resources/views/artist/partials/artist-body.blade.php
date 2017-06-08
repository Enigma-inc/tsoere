<section>
    <div class="section-header margin-top-50">
    </div>
    <div class="section-body no-margin">
        <div class="row">
                  @foreach($profile->tracks as $track)
                <div class="col-xs-12 col-sm-6 col-md-4">                  
                   <div class="card card-bordered style-default-light track-card">
                        <div class="card-body">
                            <div class="artwork" style="background-image: url('{{url($track->artwork)}}');">
                                <div class="play-button" >
                                        <a href="#"><i class="fa fa-play-circle-o"></i></a>
                                    </div>
                            </div>
                            <div class="details">
                                <div class="header">
                                    <div class="artist-name text-primary text-bold">{{$profile->name}}</div>                            
                                    <div class="track-title">{{$track->title}}</div>
                                </div>
    
                                  <div class="footer">
                                  <download-track input-track="{{$track}}" inline-template>
                                       <div @click="download()" class="cursor-hand"> 
                                       <i class="fa fa-download text-accent"></i> 
                                       <small>(123)</small>
                                       </div>
                                 </download-track>
                                  <div>
                                  
                                  </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                </div>
                    
                @endforeach

        </div>
    </div>
</section>