@extends('layouts.master')
@section('meta')
		@include('layouts.social-share.meta')
@endsection
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
                        <div class="body">
                            <div class="artist-name">
                                 {{$artist->name}}
                            </div>
                            <div class="footer">
                                 {{$artist->tracks_count}} {{ str_plural('song',$artist->tracks_count)}}
                            </div>
                        
                        </div>
                        <div class="category ">
                            <span>TODO</span>
                        </div>              
                </div>

            </div>
            
            </a>
          @endforeach 
    </div> 
@endsection


