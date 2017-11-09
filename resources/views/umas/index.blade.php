
@extends('layouts.master')
@section('meta')
		@include('layouts.social-share.meta')
@endsection
@section('content')
<div>
   @foreach($artistCategories as $category)
	@if(count($category['artists'])>0)
	 @if($category['code']!='BMV')
		 <div class="section-header">
			<ol class="breadcrumb">
				<li class="active">{{$category['name']}}</li></li>
			</ol>
		</div>
		<div class="section-body no-margin" id="top">
			<div   class="row">
			<div  class="slick-slider-wrapper">  
				@foreach($category['artists'] as $track)
					<div class="col-xs-12 col-sm-6 col-md-4 margin-top-20">
						@include('umas.players.multi-track-player') 
					</div>
				@endforeach
			</div>
			</div>
		</div>
	 @else
		  <div class="section-header">
			<ol class="breadcrumb">
				<li class="active">{{$category['name']}}</li></li>
			</ol>
		</div>
		<div class="section-body no-margin" >
			<div   class="row">
			<div  class="slick-slider-wrapper">  
				@foreach($category['artists'] as $track)
					<div class="col-xs-12 col-sm-6 col-md-4 margin-top-20">
						@include('umas.players.multi-track-video-player') 
					</div>
				@endforeach
			</div>
			</div>
		</div>
	 @endif
	@endif
   @endforeach
	


    
</div>

@endsection
@section('footer')
      {{--  @include('artist.footer-card')  --}}
@endsection
