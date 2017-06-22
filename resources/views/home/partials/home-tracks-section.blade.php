<div>
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
</div>
