@extends('layouts.master') 

@section('content')
 @include('track.partials.track-body')
@endsection
@section('player-setup')
	<div class="gearWrap "> <div id="gearContainer" class="gear" data-gear="{{url('player/json/setup-inner-pages.json')}}"></div> </div>
@endsection
@include('layouts.partials.player-script')
