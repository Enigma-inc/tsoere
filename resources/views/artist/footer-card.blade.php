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
                            <span>{{$artist->category->name}}</span>
                        </div>              
                </div>

            </div>
            
            </a>
          @endforeach 
    </div> 