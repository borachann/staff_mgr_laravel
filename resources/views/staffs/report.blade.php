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
	<tbody id="tblReport">
		<tr>
			<td class="text-center" colspan="10">No Record</td>
		</tr>
	</tbody>

</table>
</div>


@endsection

@push('scripts')
<script type="text/javascript">
	$(function(){
		setCalendar();
		listReport();

		function setCalendar(){
			$("#REGS_DATE_S").datepicker({
	      	defaultDate: new Date(),
		    setDate: new Date(),
		    changeMonth: true,
		    numberOfMonths: 1,
		    dateFormat: "yy-mm-dd",
		    onClose: function( selectedDate ) {
				$("#REGS_DATE_E").datepicker("option", "mimDate", selectedDate);
				listReport();

		    }
		});
			$("#REGS_DATE_E").datepicker({
	      	defaultDate: new Date(),
		    setDate: new Date(),
		    changeMonth: true,
		    numberOfMonths: 1,
		    dateFormat: "yy-mm-dd",
		    onClose: function( selectedDate ) {
				$("#REGS_DATE_S").datepicker("option", "maxDate",   selectedDate);
				listReport();
		    }
		});
		$("#REGS_DATE_S").datepicker('setDate', moment().startOf('month').format('YYYY-MM-DD'));
		// $("#REGS_DATE_E").datepicker('setDate', moment().year(moment().get('year')).month(moment().get('month') + 1).date(moment("2012-01", "YYYY-MM").daysInMonth()).format('YYYY-MM-DD'));
		$("#REGS_DATE_E").datepicker('setDate', moment().endOf('month').format('YYYY-MM-DD'));
	}
	function listReport(){
		var url = '{{ route('query') }}', data = [];

		url += '?sdate=' + $('#REGS_DATE_S').val();
		url += '&edate=' + $('#REGS_DATE_E').val();

		$.get(url, function(res){
			if (data = res.staffs) {
				console.log(data);
			}
		});

	}
});
</script>
@endpush
