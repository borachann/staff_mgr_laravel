@extends ('layouts.app')

@section ('content')

<h3 align="center">Register Information</h3>
<hr>
	<form method="POST" action="{{ route('staff.store') }}">
		{{ csrf_field() }}

		@include('staffs.form', ['btnName' => 'Create'])
	</form>



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



@endsection

@push('scripts')
<script>
	$(function(){
		$('#fileUpload').on('change', function(){
			$('#frmImageUpload').submit();
		});

		$('#frmImageUpload').submit(function(e) {
			e.preventDefault();

			// var data = {
			// 	'_token': $('input[name=_token]').val(),
			// 	'file': $('input[name=imageUpload]').val()
			// };


			var data = new FormData($('#frmImageUpload'));
			var link = $(this).attr('action');

			$.post(link, data, function(res) {
				console.log(res);
				// $("#PHOTO_IMG").attr('src','');
			});
		});

	});
</script>
@endpush
