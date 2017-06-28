    
                <player player-container="{{'#player-'.$track->playerContainer}}" :track="{{$track}}"  inline-template>            
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body" >
                        
                            <div class="artwork" style="background-image: url('{{$track->artwork}}');">
                                <div  class="play-button" @click="playAudio()"  >
                                        <i :class="[playerActionClass]"></i>
                                    </div>
                            </div>
                            <div class="details">
                            
                                <div class="header">
                                    <div class="artist-name text-primary text-bold margin-bottom-5">{{$track->artist->name}}</div> 
                                    <div class="track-title ">{{$track->title}}</div>
                                   
                                    <div class="section-floating-action-row col-xs-12 padding-right-0 margin-right-0">
                                    <div class="social">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{$track->path}}" data-toggle="tooltip" title="share on facebook" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i class="text-info fa fa-facebook"></i></a>
                                        <a href="whatsapp://send?text={{$track->path}}" data-toggle="tooltip" title="share on whatsapp" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i href="#" class="text-success text-ultra-bold fa fa-whatsapp"></i></a>                                        
                                        <a href="https://twitter.com/intent/tweet?url={{$track->path}}" data-toggle="tooltip" title="share on twitter" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i href="#" class="text-info text-bold fa fa-twitter"></i></a>                                   
                                    </div>
                                            
                                    <div class="genre">
                                            <div class="track-genre text-sm ">
                                               <a class="badge badge-accent" href="{{route('track.category',['genre'=>str_slug($track->genre->name)])}}">
                                               {{$track->genre->name}}
                                               </a>
                                            </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                <div class="player-container">
                                       <div  id="player-{{$track->playerContainer}}"></div>
                                       <div v-if="loading" class="loading">
                                              <span class="text-primary" v-cloak>@{{loadingText}}</span>
                                       </div>
                                </div>
                                <div class="info-container">
                                   <span v-if="elapsedTime" v-cloak>@{{elapsedTime|time}}</span>
                                   <span v-if="audioDuration" v-cloak>@{{audioDuration|time}}</span>
                                   
                                </div>
                                 <div class="footer">
                               
                                <div class="action-btn" >
                                    <i class="md md-headset text-primary"></i>
                                    <small class="play-value" v-cloak>(@{{played}})</small>
                                </div>
                                <div @click="download()" class="action-btn">
                                    <i class="fa fa-download text-primary"></i>
                                    <small class="play-value" v-cloak>(@{{downloads}})</small>
                                </div>
                            </div>
                            </div>
                         </div>
                    </div>      
                </player> 

             