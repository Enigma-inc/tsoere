<div class="margin-top-20">
    <div class="section-body no-margin">
        <div class="row">
            <div class="col-xs-12 col-sm-12  col-md-10 col-md-offset-1">
            @if($track)
            <single-track-player player-container="{{'#player-'.$track->playerContainer}}" :track="{{$track}}"  inline-template>            
                <div class="card card-bordered style-default-dark single-track-card">
                    <div class="card-body">
                       <div class="content">
                        <div class="artwork" style="background-image: url('{{url($track->artwork)}}');">
                            <div  class="play-button" @click="playAudio()">
                                <a href="#"><i :class="[playerActionClass]"></i></a>
                            </div>
                        </div>
                        <div class="details" >
                            <div class="header">
                                    <div class="artist-name text-primary text-bold margin-bottom-5">{{$track->artist->name}}</div>                            
                                    <div class="track-title">{{$track->title}}</div>
                                    <div class="section-floating-action-row">
                                        @include('artist.partials.single-track-social-share')                                        
                                    </div>
                            </div>
                             <div class="footer">

                                <div   class="action-btn" >
                                    <i class="md md-headset text-primary"></i>
                                    <small class="play-value" v-cloak>(@{{played}})</small>
                                </div>
                                <div>
                                    @if($track->downloadable)
                                    <div @click="download()" class="action-btn">
                                    <i class="fa fa-download text-primary"></i>
                                    <small class="play-value" v-cloak>(@{{downloads}})</small>
                                     </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                       </div>
                      <div class="wave-section">
                          <div class="player-container">
                                       <div  id="player-{{$track->playerContainer}}"></div>
                                       <div v-if="loading" class="loading">
                                              <span class="text-primary-dark" v-cloak>@{{loadingText}}</span>
                                       </div>
                            </div>
                              <div class="info-container">
                                   <span v-if="elapsedTime" v-cloak>@{{elapsedTime|time}}</span>
                                   <span v-if="audioDuration" v-cloak>@{{audioDuration|time}}</span>
                            </div>
                      </div>
                    </div>
                </div>
                </single-track-player>
                @else
                <div><h3>Track Not Found</h3></div>
                @endif
                
            </div>

        </div>
    </div>
</div>
@if($relatedTracks->count()>0)
<div>

    <div class="page-header margin-10 padding-bottom-10">
        <ol class="breadcrumb"><li class="active">Other Tracks By {{ $profile->name}}</li></ol>
    </div>
    <div class="section-body no-margin">

        <div class="row margin-top-20">
              @foreach($relatedTracks as $track)
                <div class="col-xs-12 col-sm-6 col-md-4">                  
                     @include('player.multi-track-player') 
                </div>    
                @endforeach
        </div>
    </div>
</div>
@endif


