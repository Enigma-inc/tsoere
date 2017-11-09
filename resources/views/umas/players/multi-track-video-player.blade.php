    
                <div player-container="{{isset($section)?'#'.$section.'-'.$track['id']:'#player-'.$track['id']}}" >            
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body" >
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
                                       
                                </div>

                               </div>
                            </div>
                            </div>
                         </div>
                    </div>      
                </div> 

             