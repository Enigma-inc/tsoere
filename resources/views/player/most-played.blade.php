@php($section='played')  
 @foreach($mostPlayedTracks as $index=>$track)
            <div id="section-played" class="col-xs-12 col-sm-6 col-md-4">
              @include('player.multi-track-player') 
            </div>
 @endforeach


             