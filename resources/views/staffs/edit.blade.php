@extends ('layouts.app')

@section ('content')

	<h3 align="center">Update Information</h3>
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
