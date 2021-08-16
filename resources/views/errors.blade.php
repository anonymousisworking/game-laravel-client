@php
	$_errors = [];
	if (session('_errors')) {
		$_errors = array_merge($_errors, [session()->get('_errors')]);
	}

	if ($errors->any()) {
		$_errors = array_merge($_errors, $errors->all());
	}
@endphp
@if (!empty($_errors))
	<div class="errors-wrapper">
	@foreach ($_errors as $error)
		<div class="error red">{{ $error }}</div>
	@endforeach
	</div>
@endif