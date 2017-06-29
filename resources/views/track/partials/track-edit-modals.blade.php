

<!-- line modal -->
<div class="modal fade" id="Title-edit-{{$track->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Edit Title</h3>
		</div>
		<div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('track.title.update',['trackId'=>$track->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="margin-bottom-40 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">Track Title</label>

                            <div class="col-md-8">
                            <input id="title" type="text" class="form-control" name="title" value="{{$track->title}}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button id="register" type="submit" class="btn btn-primary col-xs-12">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
		           </div>
    	  </div>
    </div>
</div>

<div class="modal fade" id="Artwork-edit-{{$track->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Edit Artwork</h3>
		</div>
		<div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('track.artwork.update',['trackId'=>$track->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                      <div class="margin-bottom-40 form-group{{ $errors->has('artwork') ? ' has-error' : '' }}">
                            <label for="artwork" class="col-md-3 control-label">Artwork</label>

                            <div class="col-md-8">
                                <input id="artwork" type="file" class="form-control" name="artwork"
                                 accept=".jpg,.png,.jpeg" required>
                                @if ($errors->has('artwork'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('artwork') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button id="register" type="submit" class="btn btn-primary col-xs-12">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
		           </div>
    	  </div>
    </div>
</div>