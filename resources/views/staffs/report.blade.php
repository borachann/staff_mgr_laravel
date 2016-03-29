@extends ('layouts.app')

@section ('content')
<div class='text-center'>
	<h3 align="center">Report Information <span class="pull-right"><a href="javascript:;"><i class="fa fa-print"></i></a></span></h3>

</div>
	<hr>

<label>Start Date : </label>	<input type="text" id="REGS_DATE_S" style="padding-left: 1%;"> ~
<label>End Date : </label>	<input type="text" id="REGS_DATE_E" style="padding-left: 1%;">
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
			<th style="text-align: center;">Status</th>
		</tr>
	</thead>
	<tbody id="tblReport">
		<tr>
			<td class="text-center" colspan="10">No Record</td>
		</tr>
	</tbody>

</table>
</div>
<hr>
<label>Total Active : </label>	<input type="text" id="txtactive" style="padding-left: 1%;"> ~
<label>Total Disactiv : </label>	<input type="text" id="txtdisactive" style="padding-left: 1%;">

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
			var st = "";
			var act = 0;
			var dis = 0;
			/*if (data = res.staffs) {
				console.log(data);
			}*/

			if(res.staffs.total > 0){
				for( i=0; i < res.staffs.total; i++){
					st += "<tr>"
						st += "<td>" + (i+1) + "</td>";
						st += "<td>" + res.staffs.data[i].fp_number + "</td>";
						st += "<td>" + res.staffs.data[i].name + "</td>";
						st += "<td>" + res.staffs.data[i].gender+ "</td>";
						st += "<td>" + res.staffs.data[i].position+ "</td>";
						st += "<td>" + res.staffs.data[i].phone+ "</td>";
						if(res.staffs.data[i].status == 1){
							act += 1;
							st += "<td class='text-center'>" + 'Active'+ "</td>";
						}else{
							dis += 1;
							st += "<td class='text-center'>" + 'Disactive'+ "</td>";
						}
						st += "</tr>";
				}
			}else{
				st += "<tr>";
					st +="<td class='text-center' colspan='10'>No Record</td>";
				st += "</tr>";
			}
				$("#tblReport").html(st);
				$("#txtactive").val(act);
				$("#txtdisactive").val(dis);
		});

	}
});
</script>
@endpush
