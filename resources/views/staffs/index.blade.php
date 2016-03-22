@extends('layouts.app')

@section('content')

<style>
	div.container {
		padding-right: 10px;
	}
</style>



<table class="table">
	<thead>
		<tr>
			<th>FP_Number</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Position</th>
			<th>Date of Birth</th>
			<th>Skill</th>
			<th>Level</th>
			<th>Readable</th>
			<th>Lead Group</th>
			<th>Phone</th>
			<th>Work Group</th>
			<th>Start Date</th>
			<th>Update</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($staffs as $staff)
			<tr>
				<td style="display:none;">{{ $staff->id }}</td>
				<td><li></li></td>
				<td>{{ $staff->fp_number }}</td>
				<td>{{ $staff->name }}</td>
				<td>{{ $staff->gender }}</td>
				<td>{{ $staff->position }}</td>
				<td>{{ $staff->dob }}</td>
				<td>{{ $staff->skill }}</td>
				<td>{{ $staff->level }}</td>
				<td>{{ $staff->readable }}</td>
				<td>{{ $staff->ld_grp }}</td>
				<td>{{ $staff->phone }}</td>
				<td>{{ $staff->work_grp }}</td>
				<td>{{ $staff->created_at }}</td>
				<td>{{ $staff->updated_at }}</td>
				<td>@include('staffs.delete')</td>
				<td>{{ link_to_route('staff.edit','UPDATE', $staff->id, ['class' => 'btn btn-sm btn-primary']) }}</td>
				<td>{{ link_to_route('staff.show','DETAIL', $staff->id, ['class' => 'btn btn-sm btn-info']) }}</td>
			</tr>
		@endforeach
	</tbody>

</table>
{{ link_to_route('staff.create', 'Create', null, ['class' => 'btn btn-default']) }}

{!! $staffs->links() !!}

@endsection

@push('scripts')

@endpush
