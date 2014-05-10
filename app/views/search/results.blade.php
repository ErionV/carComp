@extends('layouts.main')

@section('content')

@foreach($ads as $ad)

<div class="row">
	<div class="col-xs-2 col-xs-offset-1 carAdImage removeLinkDec">
		<a href="/ad/{{$ad->id}}">
			<img src="/images/{{CarPics::whereAdvert_id($ad->id)->first()->image}}">
		</a>
	</div>
	<div class="col-xs-9">
		<div class="row">
			<div class="col-xs-9 removeLinkDec">
				<a href="/ad/{{$ad->id}}">
					<h4>{{$ad->title}}</h4>
				</a>
			</div>
			<div class="col-xs-3">
				<h4>£{{$ad->price}}</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-3">
				<ul class="list-group catagoriesAd">
					<li class="list-group-item"><strong>Mileage:</strong> {{$ad->mileage}}</li>
					<li class="list-group-item"><strong>Fuel Type:</strong> {{$ad->fuel_type}}</li>
					<li class="list-group-item"><strong>Gear Box:</strong> {{$ad->gearbox}}</li>
					<li class="list-group-item"><strong>Engine Size:</strong> 3.4L</li>
				</ul>
			</div>
			<div class="col-xs-6 descriptionTitle">
				<ul class="list-group catagoriesAd">
					<li class="list-group-item"><strong>Description:</strong></li>
					<li class="list-group-item descriptionAd">
						{{str_limit($ad->description, 200)}}
					</li>
				</ul>
			</div>
			<div class="col-xs-3">
				<div class="btn-group">
					@if(Auth::check())
					<a class="btn btn-default" href="/watch/{{$ad->id}}"><span class="glyphicon glyphicon-floppy-disk"></span></a>
					<a class="btn btn-default " href="/compare/{{$ad->id}}"><span class="glyphicon glyphicon-plus-sign"><span></a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-10 col-xs-offset-1 separator"></div>

@endforeach

<div class="col-xs-12 text-center">{{$ads->appends(Request::except('page'))->links()}}</div>
@stop