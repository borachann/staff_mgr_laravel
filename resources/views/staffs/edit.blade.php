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
				<input id="txtImageUploaded" type="hidden" value="{{ $staff->photo_path }}" name="photo_path">
			{{ Form::close() }}

			<form action="{{ route('upload.image') }}" method="post" enctype="multipart/form-data" id="frmImageUpload">
				{{ csrf_field() }}
		        <div class="col-md-2">
					<div class="form-group">
				      	<div class="col-md-3">
			 				<a href="javascript:" class="btn_photo_x" style="display: none;">
								<img src="/img/profile.png" id="photoDeleteBtn">
							</a>
							<img src="/img/profile.png" id="PHOTO_IMG" data-id="PHOTO_IMG" style="width: 130px;height: 130px;" alt="">
							<input id="fileUpload" type="file" name="imageUpload" value="upload">
						</div>
				 	</div>
				</div>
		    </form>
		{{-- </form> --}}

@endsection

@push('scripts')
<script>
	$(function(){
		$("#PHOTO_IMG").attr('src','/upload/' + $("#txtImageUploaded").val());

		$('#fileUpload').on('change', function(){
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



	});
</script>
@endpush
