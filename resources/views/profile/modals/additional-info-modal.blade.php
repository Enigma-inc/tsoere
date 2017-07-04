<div class="modal fade " id="Additional_Info" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:90%">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="lineModalLabel">Add/Edit Your Additional Information</h4>
		</div>
		<div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('profile.additionalinfo',['artistId'=>Auth::user()->id])}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="row">
                        <div class="margin-bottom-30 form-group{{ $errors->has('booking_phone') ? ' has-error' : '' }} col-md-6">
                            <label for="booking_phone" class="col-md-3 control-label">Booking Phone</label>
                            <div class="col-md-8">
                            <input id="booking_phone" type="text" class="form-control" name="booking_phone" value="{{ $artist->booking_phone }}">

                                @if ($errors->has('booking_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="margin-bottom-30 form-group{{ $errors->has('booking_email') ? ' has-error' : '' }} col-md-6">
                            <label for="booking_email" class="col-md-3 control-label">Booking Email</label>

                            <div class="col-md-8">
                            <input id="booking_email" type="email" class="form-control" name="booking_email" value="{{$artist->booking_email }}">

                                @if ($errors->has('booking_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booking_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="margin-bottom-30 form-group{{ $errors->has('facebook') ? ' has-error' : '' }} col-md-6">
                            <label for="facebook" class="col-md-3 control-label">Facebook Link</label>
                            <div class="col-md-8">
                            <input id="facebook" type="url" class="form-control" name="facebook" value="{{ $artist->facebook }}">

                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="margin-bottom-30 form-group{{ $errors->has('about') ? ' has-error' : '' }} col-md-6">
                            <label for="about" class="col-md-3 control-label">Biography</label>
                            <div class="col-md-8">
                            <textarea name="about" id="textarea1" class="form-control" rows="3" value="{{ $artist->about }} "></textarea>
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="margin-bottom-30 form-group{{ $errors->has('instagram') ? ' has-error' : '' }} col-md-6">
                            <label for="instagram" class="col-md-3 control-label">Instagram Link</label>
                            <div class="col-md-8">
                            <input id="instagram" type="url" class="form-control" name="instagram" value="{{ $artist->instagram }}">
                                @if ($errors->has('instagram'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="margin-bottom-30 form-group{{ $errors->has('twitter') ? ' has-error' : '' }} col-md-6">
                            <label for="twitter" class="col-md-3 control-label">Twitter Link</label>
                            <div class="col-md-8">
                            <input id="twitter" type="url" class="form-control" name="twitter" value="{{ $artist->twitter}}">
                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="margin-bottom-30 form-group{{ $errors->has('affiliation') ? ' has-error' : '' }} col-md-6">
                            <label for="affiliation" class="col-md-3 control-label">Affiliation</label>
                            <div class="col-md-8">
                             <textarea name="affiliation" id="textarea2" class="form-control" rows="3" value="{{ $artist->affiliation}}"></textarea>
                                @if ($errors->has('affiliation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('affiliation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>    

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
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