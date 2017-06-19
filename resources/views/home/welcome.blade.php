@extends('layouts.master')
@section('content')
@include('home.partials.home-tracks-section')

@endsection
@section('footer')
   <div class="footer-artists-container ">
          @foreach($artists as $artist)
          <a href="{{route('artist.home',['slug'=>$artist->slug])}}">
          <div class="style-primary artist-card card">
              <img class="width-1 img-circle img-responsive" src="{{url($artist->thumbnail)}}" alt="">
               <div class="contents">

              <div class="name">{{$artist->name}}</div>
              <div class="category ">{{$artist->category}}</div>               
              
               </div>
            </div>
            </a>
          @endforeach
    </div> 
@endsection
@section('page-scripts')
    <script>
       $(document).ready(function(){
              $('.play-button').click(function(){
               incrementPlayCount(this);
           });

        $(".footer-artists-container").smoothDivScroll({
                    mousewheelScrolling: "allDirections",
                    autoScrollingMode: "always",
                    autoScrollingDirection: "backAndForth",
                    autoScrollingStep: 2,
                    autoScrollingInterval: 25,
                    touchScrolling: true,

                }).bind("mouseover", function () {
                    $(this).smoothDivScroll("stopAutoScrolling");
                }).bind("mouseout", function () {
                    $(this).smoothDivScroll("startAutoScrolling");
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