@extends('layouts.master') 

@section('content')
<div class="profile">
    @include('profile.partials.profile-header')
    @include('profile.partials.profile-body')
</div>
 
@endsection
