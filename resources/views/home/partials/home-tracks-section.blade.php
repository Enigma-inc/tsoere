<div>

@if($tracks->count()>0)
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Recently Added</li></li>
		</ol>
	</div>
	<div class="section-body no-margin" id="top">
		<div class="row">
		@foreach($tracks as $track)
		<div class="col-xs-12 col-sm-6 col-md-4">
		@include('player.multi-track-player') 
		</div>
		@endforeach
		</div>
	</div>
@endif

@if($mostSharedTracks->count()>0)
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Trending on Social Media</li></li>
		</ol>
	</div>
	<div class="section-body no-margin" id="top">
        <div class="row">
        @include('player.most-social-shared') 
           
        </div>
	</div>

 @endif

 @if($mostDownloadedTracks->count()>0)
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Most Downloaded Tracks</li></li>
		</ol>
	</div>
	<div class="section-body no-margin" id="top">
        <div class="row">
             @include('player.most-downloaded') 
        </div>
	</div>
@endif

@if($mostPlayedTracks->count()>0)
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Most Played Tracks</li></li>
		</ol>
	</div>
	<div class="section-body no-margin" id="top">
        <div class="row">
              @include('player.most-played') 
        </div>
	</div>
@endif
    
</div>
