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

		@include('partials/form-input', ['label' => 'Date of Birth', 'size' => '50', 'name' => 'dob', 'id' => 'REGS_DATE_S'])
	
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

		@if (isset($showDate))
			@include('partials/form-input', ['label' => 'Start Date', 'size' => '50', 'name' => 'created_at', 'id' => 'txtstartdate', 'value' => $staff->created_at->format('d-m-Y')])
		@endif

		<div class="form-group">
		  <label class="control-label col-md-2" for="txtposition">Description : </label>
		  <div class="col-md-10">
		  		{{-- <textarea class="form-control" rows="5" name="description" id="txtdescription"></textarea> --}}
		  		{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) }}
		  </div>
		</div>

		<!-- <div class="form-group">
		  <label class="control-label col-md-2">Attach File : </label>
		  <div class="col-md-10">
		  		<sapn id="file_up">
		  			<input type="text" class="form-control" rows="5" id="txtAttach" placeholder="Choos a file to upload..." name="file_path">
	  			</sapn>
		  </div>
		</div> -->
		@include('partials/form-input', ['label' => 'Attach File ', 'id' => 'txtAttach', 'name' => 'file_path', 'size' => '1000'])

		<div class="form-group">
		  <label class="control-label col-md-2"></label>
		  <div class="col-md-10" style="text-align: right;">
		  		<button type="submit" class="btn btn-primary">{{ $btnName }}</button>
		  		{{ link_to_route('staff.index','Cancel',null,['class' => 'btn btn-primary']) }}
		  		{{-- {{ link_to_route('staff','Cancel',['class' => 'btn btn-primary'] )}} --}}
		  		{{-- {{ link_to_route('staff.index','Cancel', null) }} --}}

		  </div>
		</div>

	</div>


</div>
