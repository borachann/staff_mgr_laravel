@extends ('layouts.app')

@section ('content')
<div class='text-center'>
	<h3 align="center">Report Information <span class="pull-right hidden-print"><a href="javascript:;" onclick="window.print()"><i class="fa fa-print"></i></a></span></h3>

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
<div class="text-center hidden-print">
	<ul id="pagination" class="pagination"></ul>
</div>
<label>Total Active : </label>	<input type="text" id="txtactive" style="padding-left: 1%;"> ~
<label>Total Disactive : </label>	<input type="text" id="txtdisactive" style="padding-left: 1%;">
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

	function listReport(page){
		page = page || 1;

		var url = '{{ route('query') }}', data = [];

		url += '?sdate=' + $('#REGS_DATE_S').val();
		url += '&edate=' + $('#REGS_DATE_E').val ();
		url += '&page=' + page;

		$.get(url, function(res) {
			var st = "";

				record = res.staffs.data,
				object = res.staffs;

			if(record.length != 0){
				for( i=0; i < record.length; i++){
					var staff = record[i];

					st += "<tr>"
					st += "<td>" + (object.from + i) + "</td>";
					st += "<td>" + staff.fp_number + "</td>";
					st += "<td>" + staff.name + "</td>";
					st += "<td>" + staff.gender+ "</td>";
					st += "<td>" + staff.position+ "</td>";
					st += "<td>" + staff.phone+ "</td>";
					if(staff.status == 1){
						st += "<td class='text-center'>" + 'Active'+ "</td>";
					}else{
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

			pager('#pagination', page, object.last_page);
		});

	}

	function pager(id, currentPage, total) {
		var page = [];
		if (!currentPage || !total || !id) return;
		// page.push('<li ' + (currentPage == 1 ? 'class="disabled"' : '') + '><a href="javascript:gotoPage(1)" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
		if (currentPage == 1) { //
			page.push('<li class="disabled"><a href="javascript:" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
		} else {
			page.push('<li><a href="javascript:gotoPage(1)" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
		}
		for (var i = 1; i <= total; i++) {
			if (currentPage == i) {
				page.push('<li class="active"><a href="javascript:">' + i + '</a></li>');
			} else {
				page.push('<li><a href="javascript:gotoPage(' + i + ')">' + i + '</a></li>');
			}
			// page.push('<li ' + (currentPage == i ? 'class="active"' : '') + '><a href="javascript:gotoPage(' + i + ')">' + i + '</a></li>');
		}
		// page.push('<li ' + (currentPage == total ? 'class="disabled"' : '') + '><a href="javascript:gotoPage(' + total + ')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
		if (currentPage == total) {
			page.push('<li class="disabled"><a href="javascript:" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
		} else {
			page.push('<li><a href="javascript:gotoPage(' + total + ')" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
		}
		$(id).html(page.join(''));
	}

	window.gotoPage = function(page) {
		listReport(page);
	}

	function printReport(){
		var url = {{ route('printReport')}};
			url += '?sdate=' + $('#REGS_DATE_S').val();
			url += '&edate=' + $('#REGS_DATE_E').val ();

		$.get(url,function(res){
			console.log(res);
		});
	}
});
</script>
@endpush
