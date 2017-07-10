@extends('layouts.master')
@section('meta')
		@include('layouts.social-share.meta')
@endsection
@section('content')

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
                     @forelse($artists as $artist)
                      @include('artist.footer-card')
                         @empty
                            <div class="title m-b-md">
                                 Your search - <strong>{{$searchWord}}</strong> - did not yield any results.
                            </div>
                     @endforelse
              
                @endforelse

                </div>
            </div>
        </div>
        @if(!empty($tracks))
        {{$tracks->links()}}            
        @endif
@endsection
@section('footer')
  @include('artist.footer-card')
@endsection


