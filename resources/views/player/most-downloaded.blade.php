    
 @foreach($mostDownloadedTracks as $track)
      <div class="col-xs-12 col-sm-6 col-md-4">
         @include('player.multi-track-player') 
    </div>
 @endforeach