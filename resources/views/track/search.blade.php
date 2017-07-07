@extends('layouts.master')
@section('meta')
		@include('layouts.social-share.meta')
@endsection
@section('content')
						  <search></search>

        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Search Results</li></li>
            </ol>
        </div>
        <div class="section-body no-margin" id="top">
            <div   class="row">
            <div>  
                @forelse($tracks as $track)
                    <div class="col-xs-12 col-sm-6 col-md-4 margin-top-20">
                    @include('player.multi-track-player') 
                    </div>
                @empty
                <div class="title m-b-md">
                                 Your search - <strong>{{$searchWord}}</strong> - did not yield any results.
                </div>
                @endforelse

                </div>
            </div>
        </div>
        @if(!empty($tracks))
        {{$tracks->links()}}            
        @endif
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
                                 {{$artist->tracks->count()}} {{ str_plural('song',$artist->tracks->count())}}
                            </div>
                        
                        </div>
                        <div class="category ">
                            <span>{{$artist->category->name}}</span>
                        </div>              
                </div>

            </div>
            
            </a>
          @endforeach 
    </div> 
@endsection


