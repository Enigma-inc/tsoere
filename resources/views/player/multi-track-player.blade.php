    
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
                                 <track-actions :track="{{$track}}"></track-actions>
                            </div>
                         </div>
                    </div>
                </player> 