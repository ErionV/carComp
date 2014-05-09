@extends('layouts.main')

@section('content')
    @if($compareList->count())
        <div class="row">
        <!--        Empty div to move the pictures accross-->
            <div class="col-xs-2">
            </div>

            @foreach($compareList as $ad)
                <div class="col-xs-2">
	                <a href="/ad/{{$ad->advert->id}}">
                        <img class="img-thumbnail" src="/images/{{CarPics::where('advert_id',$ad->advert->id)->first()->image}}">
	                </a>
                </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-xs-2">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Price:</strong></li>
                    <li class="list-group-item"><strong>Make:</strong></li>
                    <li class="list-group-item"><strong>Model:</strong></li>
                    <li class="list-group-item"><strong>Gearbox:</strong></li>
                    <li class="list-group-item"><strong>Fuel Type:</strong></li>
                    <li class="list-group-item"><strong>Mileage:</strong></li>
                    <li class="list-group-item"><strong>Colour:</strong></li>
                </ul>
            </div>

            @foreach($compareList as $ad)
                <div class="col-xs-2 compareInfo">
                    <ul class="list-group">
                        <li class="list-group-item">£{{$ad->advert->price}}</li>
                        <li class="list-group-item">{{$ad->advert->make}}</li>
                        <li class="list-group-item">{{$ad->advert->model}}</li>
                        <li class="list-group-item">{{$ad->advert->gearbox}}</li>
                        <li class="list-group-item">{{$ad->advert->fuel_type}}</li>
                        <li class="list-group-item">{{$ad->advert->mileage}}</li>
                        <li class="list-group-item">{{$ad->advert->colour}}</li>
                        <a href="/compare/remove/{{$ad->id}}">
                            <li class="list-group-item">
                                <span>Remove<span>
                            </li>
                        </a>
                    </ul>
                </div>
            @endforeach
    @else

        <h3>No results, sorry</h3>

    @endif
@stop