@extends ('layouts.app')

@section ('content')

<h3 align="center">Register Information</h3>
<hr>
	<form method="POST" action="{{ route('staff.store') }}">
		{{ csrf_field() }}

		@include('staffs.form', ['btnName' => 'Create'])
		<input id="txtImageUploaded" type="hidden" name="photo_path">
	</form>

	<form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data" id="frmImageUpload">
		{{ csrf_field() }}
        <div class="col-md-2">
			<div class="form-group">
		      	<div class="col-md-3">
		 				<a href="javascript:" class="btn_photo_x" style="display: none;">
							<img src="/img/profile.png" id="photoDeleteBtn">
						</a>
					<img src="/img/profile.png" id="PHOTO_IMG" data-id="PHOTO_IMG" style="width: 130px;height: 130px;" alt="">
						<input id="txtImageUpload" type="file" name="imageUpload">
				</div>
		 	</div>
		</div>
    </form>

	<form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data" id="frmFileUpload">
		{{ csrf_field() }}
		<input id="txtFileUpload" type="file" name="fileUpload" >
	</form>

@endsection

@push('scripts')
<script>
	$(function(){
		$('#txtImageUpload').on('change', function(){
			$('#frmImageUpload').submit();
		});

		$('#frmImageUpload').on('submit', function(e) {
			e.preventDefault();

			$.ajax({
				url: $(this).attr('action'), // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(res) {   // A function to be called if request succeeds
					$('#PHOTO_IMG').attr('src', '/upload/' + res.dynamicname);
					$('#txtImageUploaded').val(res.dynamicname);
				}

			});
		});

		$('#txtAttach').click(function() {
			$('#txtFileUpload').click();
		});

		$('#txtFileUpload').on('change', function(){
			$('#frmFileUpload').submit();
		});

		$('#frmFileUpload').on('submit', function(e) {
			e.preventDefault();

			$.ajax({
				url: $(this).attr('action'),
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(res) {
					$('#txtAttach').val(res.dynamicname);
				}

			});
		});


	});
</script>
@endpush
