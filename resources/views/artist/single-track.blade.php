@extends('layouts.master') 

@section('content')
 @include('artist.partials.artist-header')
 @include('artist.partials.single-track-body')
@endsection
@section('player-setup')
	<div class="gearWrap "> <div id="gearContainer" class="gear" data-gear="{{url('player/json/setup-single-track.json')}}"></div> </div>
@endsection
@include('layouts.partials.player-script')