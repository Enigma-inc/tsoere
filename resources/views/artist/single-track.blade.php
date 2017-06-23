@extends('layouts.master') 
@section('meta')
    @include('layouts.social-share.og-single-track')
@endsection
@section('content')
 @include('artist.partials.artist-header')
 @include('artist.partials.single-track-body')
@endsection

