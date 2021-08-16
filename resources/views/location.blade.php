@extends('layout')

@section('content')
	<div class="location">
		<img src="img/area.jpg" usemap="#map" class="map" style="opacity: 0;">
		<map id="map">
			<area shape="poly" class="loc-0" coords="170,121,170,106,166,97,167,90,176,89,177,61,187,53,194,59,213,45,224,57,244,62,243,86,248,92,247,119,278,117,293,96,307,118,320,89,344,122,344,157,337,157,334,148,294,152,288,163,226,160,217,150,203,152,197,162,183,160,176,152,164,153,164,134">
			<area shape="poly" class="loc-1" coords="169,192,182,184,185,168,177,154,140,154,125,173,124,182,163,196">
			<area shape="poly" class="loc-2" coords="308,189,324,193,338,187,337,173,340,171,335,153,299,152,283,171,282,185,304,193">
			<area shape="poly" class="loc-3" coords="260,215,279,211,290,201,286,191,264,185,251,183,246,167,240,167,239,180,230,183,213,186,200,193,195,201,201,206,213,212,233,216">
			<area shape="poly" class="loc-4" coords="30,220,34,217,34,204,27,204,22,201,26,198,33,198,31,191,37,188,41,193,39,200,39,217,45,221,32,222">
			<area shape="poly" class="loc-5" coords="418,165,419,156,413,159,410,154,419,147,417,141,421,139,423,146,430,145,435,148,425,154,425,164,422,167">
		</map>
	</div>
	<div class="location-select">
		<div class="location-block">
			<div class="title">Локации</div>
			<div class="list">
				<div class="loclink-4">Озеро</div>
				<div class="loclink-5">Лес</div>
			</div>
		</div>

		<div class="location-block">
			<div class="title">Объекты</div>
			<div class="list">
				<div class="loclink-0">Башня сражений</div>
				<div class="loclink-2">Банк</div>
				<div class="loclink-1">Магазин</div>
			</div>
		</div>

		<div class="location-block">
			<div class="title">Персонажи</div>
			<div class="list">
				<div class="loclink-3">Фонтан</div>
			</div>
		</div>
	</div>
@endsection