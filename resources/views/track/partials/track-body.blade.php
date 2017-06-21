<section>
   <div class="section-header margin-top-40 margin-bottom-40">
        <h1 class="page-header text-primary">{{$category -> name}}</h1>
    </div>
    <div class="section-body no-margin" id="top">
        <div class="row">
              @foreach($tracks as $track)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                         @include('player.multi-track-player') 
                    </div>
              @endforeach
        </div>
    </div>
</section>
