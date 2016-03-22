<div class="form-group">
	<label class="control-label col-md-2" for="{{ $name }}">{{ $label }} : </label>
	<div class="col-md-10">
{{--     	<input type="text" class="form-control" maxlength="{{ $size }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $label }}"/> --}}

    	{{ Form::text($name, null, ['id' => $id, 'class' => 'form-control', 'maxlength' => $size, 'placeholder' => $label]) }}
  	</div>
</div>
