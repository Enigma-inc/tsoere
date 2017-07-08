@extends('layouts.master')
@section('meta')
		@include('layouts.social-share.meta')
@endsection
@section('content')
@include('home.partials.home-tracks-section')

@endsection
@section('footer')
      @include('artist.footer-card')
@endsection


