<div class="form-horizontal">
	<div class="col-md-10">

		@include('partials/form-input', ['label' => 'FP Number', 'size' => '10' ,'name' => 'fp_number', 'id' => 'txtFP'])
		@include('partials/form-input', ['label' => 'Name', 'size' => '50' , 'name' => 'name', 'id' => 'txtName'])

		<div class="form-group">
			<label class="control-label col-md-2">Gender : </label>
			<div class="col-md-10">
	        	<label class="radio-inline">
	        		{{-- <input type="radio" value="m" name="gender" checked="true"> --}}
	        		{{ Form::radio('gender', 'm', true) }} Male
	        	</label>
					<label class="radio-inline">
						{{-- <input type="radio" value="f" name="gender"> --}}
						{{ Form::radio('gender', 'f') }} Female
					</label>
	      	</div>
		</div>

		@include('partials/form-input', ['label' => 'Date of Birth', 'size' => '50', 'name' => 'dob', 'id' => 'txtdob'])
		@include('partials/form-input', ['label' => 'Position', 'size' => '100', 'id' => 'txtposition', 'name' => 'position'])
		@include('partials/form-input', ['label' => 'Skill', 'id' => 'txtskill', 'name' => 'skill', 'size' => '50'])
		@include('partials/form-input', ['label' => 'Level', 'size' => '50','id' => 'txtlevel', 'name' => 'level'])
		<div class="form-group">
			<label class="control-label col-md-2">Read Drawing? : </label>
			<div class="col-md-10">
				{{ Form::checkbox('readable') }}
				{{-- <label ><input style="font-size: 10px !important; " type="checkbox" name="readable" id="readable"></label> --}}
	      	</div>
		</div>
		@include('partials/form-input', ['label' => 'Lead Group', 'id' => 'txtldgrp', 'name' => 'ld_grp', 'size' => '50'])
		@include('partials/form-input', ['label' => 'Phone Number', 'id' => 'txtphone', 'name' => 'phone', 'size' => '10'])
		@include('partials/form-input', ['label' => 'Work at Group', 'id' => 'txtworkgrp', 'name' => 'work_grp', 'size' => '50'])

		<div class="form-group">
		  <label class="control-label col-md-2" for="txtposition">Description : </label>
		  <div class="col-md-10">
		  		<textarea class="form-control" rows="5" name="description" id="txtdescription"></textarea>
		  </div>
		</div>

		<div class="form-group">
		  <label class="control-label col-md-2" for="txtAttach">Attach File : </label>
		  <div class="col-md-10">
		  		<input type="file" class="form-control" rows="5" id="txtAttach" name="file_path">
		  </div>
		</div>

		<div class="form-group">
		  <label class="control-label col-md-2" for="txtAttach"></label>
		  <div class="col-md-10" style="text-align: right;">
		  		<button type="submit" class="btn btn-primary">{{ $btnName }}</button>
		  		<button type="button" class="btn btn-primary">Cancel</button>
		  </div>
		</div>

	</div>

	<div class="col-md-2">
		<div class="form-group">
	      <div class="col-md-3">
	 				<a href="javascript:" class="btn_photo_x" style="display: none;">
						<img src="/img/profile.png" id="photoDeleteBtn">
					</a>
				<img src="/img/profile.png" id="PHOTO_IMG" data-id="PHOTO_IMG" style="width: 130px;height: 130px;" alt="">
				<form action="php/fileuploaded.php" id="formUpload1" method="post">
					  	<input class="hide" id="upload" type="file" name="photo_path" value="upload">
				</form>
			</div>
	 	</div>
	 	<div class="form-group">
			<label class="control-label col-md-10" style="text-align: center;" for="txtAttach"><i>Profile Picture</i></label>
	 	</div>
	</div>
</div>
