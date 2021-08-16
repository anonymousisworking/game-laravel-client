@extends('entry-layout')

@section('content')
	<form action="#" method="POST" id="login">
		@csrf
		<h2>Регистрация</h2>
		<div>Email</div>
		<div><input type="text" name="email" value="{{ old('email') }}"></div>
		<div>Логин</div>
		<div><input type="text" name="login" value="{{ old('login') }}"></div>
		<div>Пароль</div>
		<div><input type="password" name="password"></div>
		<div>Пол персонажа</div>
		<div>
			<select name="sex">
				<option></option>
				<option value="0"{{ old('sex') === '0' ? 'selected' : ''}}>Мужской</option>
				<option value="1"{{ old('sex') === '1' ? 'selected' : ''}}>Женский</option>
			</select>
		</div>
		<!-- <div>Ваша дата рождения(<small class="red">*Никому не отображается</small>)</div>
		<div>
			<select name="day" id="day"></select>
			<select name="month" id="month"></select>
			<select name="year" id="year"></select>
		</div> -->
		<div><button>Зарегистрироваться</button></div>
	</form>
	<script>
		// renderRange('day', [1, 31]);
		// renderRange('month', [1, 12]);
		// renderRange('year', [1900, (new Date()).getFullYear()]);

		// function renderRange(id, range) {
		// 	Array(range[1] - range[0] + 1).fill(range[0]).map((x, y) => {
		// 		let currentValue = x + y;
		// 		document.getElementById(id).innerHTML += `<option value="${currentValue}">${currentValue}</option>`;
		// 	});
		// }

	</script>
@endsection