@extends('layouts.main')

@section('content')

<div class="col-xs-4 well">
	<div class="row">
		{{Form::open(['route' => 'home', 'method' => 'GET'])}}

		<div class="col-xs-12 form-group">
			{{ Form::select('car_make', $car_make_list, $make, ['class' => 'form-control']) }}
		</div>

	</div>

	<div class="row">
		<div class="col-xs-12 form-group">
			@if($car_model_list != null && $car_model_list != null)
			{{ Form::select('car_model', $car_model_list, $model, ['class' => 'form-control']) }}
			@else
			{{ Form::select('car_model', $car_model_list, $model, ['class' => 'form-control']) }}
			@endif
		</div>
	</div>


	<button type="submit" class="btn btn-lg btn-primary form-group col-xs-9">Search</button>
	<button type="submit" class="btn btn-lg btn-primary form-group col-xs-2 col-xs-offset-1">
				<span
					class="glyphicon glyphicon-refresh">
				</span>
	</button>

	{{Form::close()}}

</div>

<div class="col-xs-8 lamboTemp">
	<img
		src="http://4.bp.blogspot.com/-_ceG8hWuOZQ/TyYtLKLvVFI/AAAAAAAAB9k/LP7wBDzkccc/s1600/lamborghini-aventador+6.jpg">

	<div class="caption_onLambo">
		<h3>Buying and selling</h3>
	</div>
</div>


@stop