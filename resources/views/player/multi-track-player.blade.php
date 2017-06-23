    
                <player player-container="{{'#player-'.$track->id}}" audio="{{$track->audio}}"  inline-template>            
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body" >
                        
                            <div class="artwork" style="background-image: url('{{$track->artwork}}');">
                                <div  class="play-button" @click="playAudio()"  >
                                        <i :class="[playerActionClass]"></i>
                                    </div>
                            </div>
                            <div class="details">
                            
                                <div class="header">
                                    <div class="artist-name text-primary text-bold">{{$track->artist->name}}</div> 
                                    <div class="track-title">{{$track->title}}</div>
                                    <div class="section-floating-action-row">
                                        <a href="{{route('track.single', ['artistSlug'=>$track->artist->slug,'trackSlug' =>$track->slug])}}" data-toggle="tooltip" title="share on facebook" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i class="text-info fa fa-facebook"></i></a>
                                        <a href="{{route('track.single', ['artistSlug'=>$track->artist->slug,'trackSlug' =>$track->slug])}}" data-toggle="tooltip" title="share on whatsapp" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i href="#" class="text-success text-ultra-bold fa fa-whatsapp"></i></a>                                        
                                        <a href="{{route('track.single', ['artistSlug'=>$track->artist->slug,'trackSlug' =>$track->slug])}}" data-toggle="tooltip" title="share on twitter" type="button" class="btn btn-xs ink-reaction btn-floating-action btn-default-dark "><i href="#" class="text-info text-bold fa fa-twitter"></i></a>                                        
                                        
                                    </div>
                                </div>
                                <div class="player-container">
                                       <div  id="player-{{$track->id}}"></div>
                                       <div v-if="loading" class="loading">
                                              <span class="text-primary" v-cloak>@{{loadingText}}</span>
                                       </div>
                                </div>
                                <div class="info-container">
                                   <span v-if="elapsedTime" v-cloak>@{{elapsedTime|time}}</span>
                                   <span v-if="audioDuration" v-cloak>@{{audioDuration|time}}</span>
                                </div>
                                 <player :track="{{$track}}"></player>
                            </div>
                         </div>
                    </div>
                </player> 

             