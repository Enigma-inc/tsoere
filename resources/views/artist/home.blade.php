@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 profile">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class=" header">{{$profile->name}}</div>
                </div>

                <div class="panel-body">
                    <div class="avatar-container">
                        <img class="avatar" src="{{Storage::url($profile->avatar)}}" alt="Image">
                    </div>
                    <div class="about">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem ut nostrum ullam laudantium laborum hic temporibus, numquam quisquam? Est maiores, aliquam sunt quasi neque modi quisquam error ad fugiat corrupti?
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class=" header">Tracks</div>
                </div>

                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection