@extends('layouts.master')
@section('content')
@include('home.partials.home-tracks-section')

@endsection
@section('footer')
   <div class="footer-artists-container ">
          @foreach($artists as $artist)
          <div class="style-default-dark artist-card">
              <img class="width-1 img-circle img-responsive" src="{{url($artist->thumbnail)}}" alt="">
               <div class="contents">
               
              <div>{{$artist->name}}</div>
              <div>{{$artist->category}}</div>
               </div>
              </div>
          @endforeach
    </div> 
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