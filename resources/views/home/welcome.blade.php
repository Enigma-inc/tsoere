@extends('layouts.master')
@section('content')
@include('home.partials.home-tracks-section')
@include('home.partials.home-artists-section')
@endsection
@section('page-scripts')
    <script>
       $(document).ready(function(){
              $('.play-button').click(function(){
               incrementPlayCount(this);
           });


            incrementPlayCount=function(_this){
                var self=_this;
              var trackId=$(self).attr('id').split('-')[2];
               $.ajax({
                   url:'./played/'+trackId,
                   success:function(response){
                $('#play-'+trackId).text('('+response.played+')');
                       
                   }
               });
           }
       });
       
          
    </script>
@endsection