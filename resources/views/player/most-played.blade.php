@php($section='played')  
 @foreach($mostPlayedTracks as $index=>$track)
            <div class="col-xs-12 col-sm-6 col-md-4 margin-top-20">
              @include('player.multi-track-player') 
            </div>
 @endforeach


             