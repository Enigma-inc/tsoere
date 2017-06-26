@extends('layouts.master')
@section('meta')
		@include('layouts.social-share.meta')
@endsection
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
                <div class="category ">
                <span>{{$artist->category}}</span>
                </div>               
                
                </div>
                </div>
            </a>
          @endforeach 
    </div> 
@endsection
@section('page-script')
<script>
   $(document).ready(function () {
                $('.footer-artists-container').slick(
                    {
                        dots: false,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 5000,
                        slidesToShow:6,
                        responsive:[
                            {
                                breakpoint:1024,
                                settings:{
                                    slidesToShow:5,
                                }
                            },
                            {
                                breakpoint:600,
                                settings:{
                                    slidesToShow:3,
                                }
                            },
                            {
                                breakpoint:480,
                                settings:{
                                    slidesToShow:2,
                                }
                            }
                        ]
                    }
                );
            });
</script>
    
@endsection

