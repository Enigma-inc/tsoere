<div>

@if($tracks->count()>0)
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Recently Added</li></li>
		</ol>
	</div>
	<div class="section-body no-margin" id="top">
		<div   class="row">
		<div id="section-recent" class="slick-slider-wrapper">  
			@foreach($tracks as $track)
				<div class="col-xs-12 col-sm-6 col-md-4 margin-top-20">
				@include('player.multi-track-player') 
				</div>
			@endforeach
			</div>
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
			<div id="section-shared" class="slick-slider-wrapper">  

        		@include('player.most-social-shared') 
        	</div>
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
			<div id="section-downloaded" class="slick-slider-wrapper"> 
             	@include('player.most-downloaded') 
			</div>
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
			<div id="section-played" class="slick-slider-wrapper"> 
              	@include('player.most-played') 
			</div>
        </div>
	</div>
@endif
    
</div>
