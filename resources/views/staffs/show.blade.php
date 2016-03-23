@extends ('layouts.app')

@section ('content')

	<h3 align="center">Detail Information</h3>
	<hr>
		{{-- <form method="POST" action="{{ route('staff.update', $staff->id) }}"> --}}
		{{-- <input type="hidden" name="_method" value="PATCH"> --}}
			{{-- {{ csrf_field() }} --}}

			{{ Form::model($staff, ['route' => ['staff.update', $staff->id] ] ) }}
				<input type="hidden" name="_method" value="PATCH">
				@include('staffs.form', ['btnName' => 'Update'])

			{{ Form::close() }}
		{{-- </form> --}}

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$("#file_up").html('<a href="#" class="control-label col-md-10" style="text-align: left;"><b>Download The Attach File</b></a>');
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
