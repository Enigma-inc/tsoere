    
                <umas-player player-container="{{isset($section)?'#'.$section.'-'.$track['id']:'#player-'.$track['id']}}" :track="{{collect($track)}}"  inline-template>            
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body" >
                        
                            <div class="artwork" style="background-image: url('{{$track['artwork']}}');">
                                <div  class="play-button" @click="playAudio()"  >
                                        <i :class="[playerActionClass]"></i>
                                    </div>
                            </div>
                            <div class="details">
                                <div class="header">
                                    <div class="artist-name text-primary text-bold margin-bottom-5">{{$track['artistName']}}</div> 
                                    <div class="track-title ">{{$track['songTitle']}}</div>
                                   
                                    <div class="section-floating-action-row col-xs-12 padding-right-0 margin-right-0">
                                    <div class="social">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=" data-toggle="tooltip" title="share on facebook" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i class="text-info fa fa-facebook"></i></a>
                                        <a href="whatsapp://send?text=" data-toggle="tooltip" title="share on whatsapp" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i href="#" class="text-success text-ultra-bold fa fa-whatsapp"></i></a>                                        
                                        <a href="https://twitter.com/intent/tweet?url=" data-toggle="tooltip" title="share on twitter" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i href="#" class="text-info text-bold fa fa-twitter"></i></a>                                   
                                    </div>
                                            
                                    <div class="genre">
                                            <div class="track-genre text-sm ">
                                             @if(isset($section))
                                              
                                               @endif
                                               <a class="badge badge-accent" href="#">
                                               {{$track['smsCode']}}
                                               </a>
                                               @if(isset($index))
                                               <span class="badge badge-rank">{{$index+1}}</span>
                                               @endif
                                            </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                <div class="player-container">
                                       <div class="player"  id="{{isset($section)? $section.'-'.$track['id']:'player-'.$track['id']}}" ></div>
                                       <div v-if="loading" class="loading">
                                              <span class="text-primary" v-cloak>@{{loadingPercentage}}%</span>
                                       </div>
                                </div>
                                <div class="info-container">
                                   <span v-if="elapsedTime" v-cloak>@{{elapsedTime|time}}</span>
                                   <span v-if="audioDuration" v-cloak>@{{audioDuration|time}}</span>
                                   
                                </div>
                                 <div class="footer margin-top-5">
                               
                                        <div class="action-btn" >
                                            {{--  <i class="md md-headset text-primary"></i>
                                            <small class="play-value" v-cloak> @{{played}}</small>  --}}
                                        </div>
                                        <div class="action-btn" >
                                            {{--  <i class="md md-share text-primary"></i>
                                            <small class="play-value" v-cloak> @{{shared}}</small>  --}}
                                        </div>
                                <div>
                               {{--  @if($track->downloadable)
                                  <div @click="download()" class="action-btn">
                                    <i class="fa fa-download text-primary"></i>
                                    <small class="play-value" v-cloak> @{{downloads}}</small>
                                </div>
                               @endif  --}}
                               </div>
                            </div>
                            </div>
                         </div>
                    </div>      
                </umas-player> 

             