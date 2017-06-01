@extends('layouts.master-no-menu')

@section('content')
<form action="/update-avatar/{{$profile->id}}" enctype="multipart/form-data" role="form" method="POST">
    {{ csrf_field()}}
<div class="container"> <br />
    <div class="row">
    	<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="text-lg text-bold text-primary">Update Profile Picture </span><small> </small></div>
				<div class="panel-body">
					<div class="input-group file-preview">
						<input placeholder="" type="text" class="form-control file-preview-filename" disabled="disabled">
						<!-- don't give a name === doesn't send on POST/GET --> 
						<span class="input-group-btn"> 
						<!-- file-preview-clear button -->
						<button type="button" class="btn btn-default file-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
						<!-- file-preview-input -->
						<div class="btn btn-default file-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="file-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif" name="avatar"/>
							<!-- rename it --> 
						</div>
						    <button type="submit"  class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span> </div>
					<!-- /input-group image-preview [TO HERE]--> 
					<br />		
					<!-- Drop Zone -->

					<br />
				</div>
			</div>
		</div>    
        
	</div>
</div>

</form>

<!-- /container --> 

<style>
/* layout.css Style */
.upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}



.file-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.file-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.file-preview-input-title {
    margin-left:2px;
}
</style>
@endsection
