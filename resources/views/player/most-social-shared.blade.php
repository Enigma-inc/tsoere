@php($section='shared')  
 @foreach($mostSharedTracks as $index=>$track)
     <div id="section-shared" class="col-xs-12 col-sm-6 col-md-4">
              @include('player.multi-track-player') 
    </div>
 @endforeach