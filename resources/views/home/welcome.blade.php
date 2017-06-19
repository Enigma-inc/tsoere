@extends('layouts.master')
@section('content')
@include('home.partials.home-tracks-section')

@endsection
@section('footer')
   <div class="footer-artists-container ">
          @foreach($artists as $artist)
          <a href="{{route('artist.home',['slug'=>$artist->slug])}}">
          <div class="style-primary artist-card card">
              <img class="width-1 img-circle img-responsive" src="{{url($artist->thumbnail)}}" alt="">
               <div class="contents">

              <div class="name">{{$artist->name}}</div>
              <div class="category ">{{$artist->category}}</div>               
              
               </div>
            </div>
            </a>
          @endforeach
    </div> 
@endsection
@section('player-setup')
	<div class="gearWrap "> <div id="gearContainer" class="gear" data-gear="{{url('player/json/setup.json')}}"></div> </div>

@endsection
@include('layouts.partials.player-script')
