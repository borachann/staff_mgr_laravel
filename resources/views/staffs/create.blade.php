@extends ('layouts.app')

@section ('content')


<h3 align="center">Register Information</h3>
<hr>
	<form method="POST" action="{{ route('staff.store') }}">
		{{ csrf_field() }}

		@include('staffs.form', ['btnName' => 'Create'])
	</form>


@endsection
