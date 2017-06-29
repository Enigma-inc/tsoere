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
                        <div class="body">
                            <div class="artist-name">
                                 {{$artist->name}}
                            </div>
                            <div class="footer">
                                 {{$artist->tracks->count()}} {{ str_plural('song',$artist->tracks->count())}}
                            </div>
                        
                        </div>
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

                $('#section-recent').slick({
                     dots: true,
                    infinite: true,
                     slidesToShow:3,
                     slidesToScroll:3,
                     rows:2,
                           responsive:[
                            {
                                breakpoint:1024,
                                settings:{
                                    slidesToShow:2,
                                    slidesToShow:2,
                                }
                            },
                            {
                                breakpoint:600,
                                settings:{
                                    slidesToShow:2,
                                    slidesToScroll:2,
                                }
                            },
                            {
                                breakpoint:480,
                                settings:{
                                       slidesToShow:1,
                                    slidesToScroll:1,
                                }
                            }
                        ]
                     
                });
                $('.footer-artists-container').slick(
                    {
                        dots: false,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 5000,
                        slidesToShow:6,
                         slidesToScroll:6,
                        responsive:[
                            {
                                breakpoint:1024,
                                settings:{
                                    slidesToShow:3,
                                     slidesToScroll:3,
                                }
                            },
                            {
                                breakpoint:600,
                                settings:{
                                    slidesToShow:3,
                                     slidesToScroll:3,
                                }
                            },
                            {
                                breakpoint:480,
                                settings:{
                                    slidesToShow:2,
                                     slidesToScroll:2,
                                }
                            }
                        ]
                    }
                );
            });
</script>
    
@endsection

