@extends('layouts.main')

@section('content')
    @if($watchList->count())
        @foreach($watchList as $ad)

            <div class="row">
                <div class="col-md-2 col-md-offset-1 carAdImage removeLinkDec">
                    <a href="/ad/{{$ad->id}}">
                        <img src="/images/{{CarPics::whereAdvert_id($ad->id)->first()->image}}">
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9 removeLinkDec">
                            <a href="/ad/{{$ad->id}}">
                                <h4>{{$ad->advert->title}}</h4>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h4>£{{$ad->advert->price}}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-group catagoriesAd">
                                <li class="list-group-item"><strong>Mileage:</strong> {{$ad->advert->mileage}}</li>
                                <li class="list-group-item"><strong>Fuel Type:</strong> {{$ad->advert->fuel_type}}</li>
                                <li class="list-group-item"><strong>Gear Box:</strong> {{$ad->advert->gearbox}}</li>
                                <li class="list-group-item"><strong>Engine Size:</strong> 3.4L</li>
                            </ul>
                        </div>
                        <div class="col-md-6 descriptionTitle">
                            <ul class="list-group catagoriesAd">
                                <li class="list-group-item"><strong>Description:</strong></li>
                                <li class="list-group-item descriptionAd">
                                    {{str_limit($ad->advert->description, 200)}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 adButtons">
                            <div class="btn-group-vertical">
                                <a class="btn btn-default "><span class="glyphicon glyphicon-plus-sign"><span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1 separator"></div>

        @endforeach

    @else

        <h3>No results, sorry</h3>

    @endif
@stop