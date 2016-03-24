@extends ('layouts.app')

@section ('content')

	<h3 align="center">Detail Information</h3>
	<hr>
		{{-- <form method="POST" action="{{ route('staff.update', $staff->id) }}"> --}}
		{{-- <input type="hidden" name="_method" value="PATCH"> --}}
			{{-- {{ csrf_field() }} --}}

			{{ Form::model($staff, ['route' => ['staff.update', $staff->id] ] ) }}
				<input type="hidden" name="_method" value="PATCH">
				@include('staffs.form', ['btnName' => 'Update', 'showDate' => true])
			{{ Form::close() }}

			{{ Form::model($staff, ['route' => ['staff.update', $staff->id] ] ) }}
		        <div class="col-md-2">
					<div class="form-group">
				      	<div class="col-md-3">
			 				<a href="javascript:" class="btn_photo_x" style="display: none;">
								<img src="/img/profile.png" id="photoDeleteBtn">
							</a>
							<img src="/upload/{{ $staff->photo_path }}" id="PHOTO_IMG" data-id="PHOTO_IMG" style="width: 130px;height: 130px;" alt="">
						</div>
				 	</div>
				</div>
			{{ Form::close() }}


		{{-- </form> --}}

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$("#file_up").html('<a href="#" class="control-label col-md-10" style="text-align: left;"><b>Download The Attach File</b></a>');
		$("input[type=text], textarea").attr('readonly','readonly');
		$("input[type=radio], input[type=checkbox]").attr('disabled',true);
	});
</script>
@endpush

@push('styles')
<style type="text/css">
	#txtAttach{
		display: none;
	}
	button[type="submit"] {
        display: none;
    }
</style>
@endpush
