@extends('layouts.master')
@section('content')
<section>
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Trending Tracks</li>
		</ol>
	</div>
<div class="section-body no-margin" id="top">
        <div class="row">
              @foreach($tracks as $track)
                <div class="col-xs-12 col-sm-6 col-md-4">                  
                   <div class="card card-bordered style-default-dark track-card">
                        <div class="card-body" >
                        
                            <div class="artwork" style="background-image: url('{{$track->artwork}}');">
                                <div id="play-button-{{$track->id}}" class="play-button " data-gearPath="{{$track->json}}" >
                                        <a href="#top"><i class="fa fa-play-circle-o"></i></a>
                                    </div>
                            </div>
                            <div class="details">
                            
                                <div class="header">
                                    <div class="artist-name text-primary text-bold"><a href="{{$track->artist->path()}}">{{$track->artist->name}}</a></div>                            
                                    <div class="track-title">{{$track->title}}</div>
                                </div>
                                 <track-actions :track="{{$track}}"></track-actions>
                                  </div>
                                </div>
                            </div>
                        </div>
                @endforeach
        </div>
    </div>
</section>
@endsection
@section('player-setup')
	<div class="gearWrap "> <div id="gearContainer" class="gear" data-gear="{{url('player/json/setup.json')}}"></div> </div>

@endsection
@include('layouts.partials.player-script')