@extends ('layouts.app')

@section ('content')

	<h3 align="center">Report Information</h3>
	<hr>

<label for="txtposition">Start Date : </label>	<input type="text" id="REGS_DATE_S" style="padding-left: 1%;"> ~
<label for="txtposition">End Date : </label>	<input type="text" id="REGS_DATE_E" style="padding-left: 1%;">
<hr>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr>
			<th>N<sup> o</sup></th>
			<th>FP_Number</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Position</th>

			{{-- <th>Skill</th> --}}
			{{-- <th>Level</th> --}}
			{{-- <th>Readable</th> --}}
			{{-- <th>Lead Group</th> --}}
			<th>Phone</th>
			{{-- <th>Work Group</th> --}}
			{{-- <th>Delete</th> --}}
			{{-- <th>Start Date</th>
			<th>Update</th> --}}
			<th style="text-align: center;">Action</th>
		</tr>
	</thead>
	<tbody>
<?php $i = 0;?>
		@foreach ($staffs as $staff)
		<?php $i++;?>
			<tr>
				<td style="display:none;">{{ $staff->id }}</td>
				<td>{{ $staffs->perPage() * ($staffs->currentPage() - 1) +$i }}</td>
				<td>{{ $staff->fp_number }}</td>
				<td>{{ $staff->name }}</td>
				<td>{{ $staff->gender }}</td>
				<td>{{ $staff->position }}</td>
				{{-- <td>{{ $staff->dob }}</td> --}}
				{{-- <td>{{ $staff->skill }}</td> --}}
				{{-- <td>{{ $staff->level }}</td> --}}
				{{-- <td>{{ $staff->readable }}</td> --}}
				{{-- <td>{{ $staff->ld_grp }}</td> --}}
				<td>{{ $staff->phone }}</td>
				{{-- <td>{{ $staff->work_grp }}</td> --}}
				{{-- <td>{{ $staff->created_at }}</td>
				<td>{{ $staff->updated_at }}</td> --}}
				{{-- <td>@include('staffs.delete')</td> --}}
				<td class="actions" style="text-align:center;">
					{{-- <a class="on-default edit-row" href="{{ route('staff.edit',$staff->id) }}">
						<i class="fa fa-trash-o"></i>
					</a> --}}
					<a class="on-default edit-row" href="{{ route('staff.delete',$staff->id) }}">
						<i class="fa fa-trash-o fa-fw"></i>
					</a> |
					<a class="on-default edit-row" href="{{ route('staff.edit',$staff->id) }}">
				      	<i class="fa fa-pencil"></i>
				    </a> |
				    <a class="on-default edit-row" href="{{ route('staff.show',$staff->id) }}">
						<i class="fa fa-info-circle"></i>
					</a>
				</td>

				{{-- <td>{{ link_to_route('staff.edit','UPDATE', $staff->id, ['class' => 'btn btn-sm btn-primary']) }}</td>
				<td>{{ link_to_route('staff.show','DETAIL', $staff->id, ['class' => 'btn btn-sm btn-info']) }}</td> --}}
			</tr>
		@endforeach
	</tbody>

</table>
</div>
<div style="text-align: center;">{!! $staffs->links() !!}</div>


@endsection

@push('scripts')
<script type="text/javascript">
	$(function(){
		setCalendar();
		function setCalendar(){
			$("#REGS_DATE_S").datepicker({
	      	defaultDate: new Date(),
		    setDate: new Date(),
		    changeMonth: true,
		    numberOfMonths: 1,
		    dateFormat: "yy-mm-dd",
		    onClose: function( selectedDate ) {
				$("#REGS_DATE_S").datepicker("option", "minDate", selectedDate);

		    }
		});
			$("#REGS_DATE_E").datepicker({
	      	defaultDate: new Date(),
		    setDate: new Date(),
		    changeMonth: true,
		    numberOfMonths: 1,
		    dateFormat: "yy-mm-dd",
		    onClose: function( selectedDate ) {
				$("#REGS_DATE_E").datepicker("option", "minDate", selectedDate);
		    }
		});
		$("#REGS_DATE_S").datepicker('setDate', moment().startOf('month').format('YYYY-MM-DD'));
		// $("#REGS_DATE_E").datepicker('setDate', moment().year(moment().get('year')).month(moment().get('month') + 1).date(moment("2012-01", "YYYY-MM").daysInMonth()).format('YYYY-MM-DD'));
		$("#REGS_DATE_E").datepicker('setDate', moment().endOf('month').format('YYYY-MM-DD'));
	}
	function listReport(){

	}
});
</script>
@endpush
