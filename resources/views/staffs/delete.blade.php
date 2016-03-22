{{ Form::model($staff, ['route' => ['staff.destroy', $staff->id] ] ) }}
	<input type="hidden" name="_method" value="delete">
	<input type="submit" class="btn btn-sm btn-danger" value="DELETE">
{{ Form::close() }}
