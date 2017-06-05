<section>
    <div class="section-header margin-top-50">
    </div>
    <div class="section-body no-margin">
        <div class="row">
            <div class="col-md-8">
                  @foreach($profile->tracks as $track)
                  <div class="card">
                      <div class="card-head">{{$track->title}}</div>
                      <div class="card-body">
                        <img src="{{url($track->artwork_path)}}" alt="">
                      </div>
                  </div>
                    
                @endforeach
            </div>

        </div>
    </div>
</section>