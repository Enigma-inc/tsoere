@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 profile">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class=" header">{{Auth::user()->name}}</div>
                </div>

                <div class="panel-body">
                    <div class="avatar-container">
                        <img class="avatar" src="{{Storage::url($profile->avatar)}}" alt="Image">
                    </div>
                    <div class="about">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem ut nostrum ullam laudantium laborum hic temporibus, numquam quisquam? Est maiores, aliquam sunt quasi neque modi quisquam error ad fugiat corrupti?
                    </div>
                    <hr>
                    <div class="row">
                        <button class="btn btn-primary btn-xs  col-xs-8 col-xs-offset-2">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class=" header">Mixtapes</div>
                </div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection