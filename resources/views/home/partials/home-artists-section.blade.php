<section>
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Artists And Poets</li>
		</ol>
	</div>
  <div  class="section-body no-margin">
      <div class="row">
          @foreach($artists as $artist)
              <div>{{$artist->name}}</div>
              <div>{{$artist->category}}</div>
          @endforeach
    </div>
  </div>

</section>