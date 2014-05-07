@extends('layouts.main')

@section('content')


        @if($ads->count())

            @foreach($ads as $ad)
                <div class="row">
                    <div class="col-md-4 carAdImage">
                        <img class="img-responsive img-thumbnail" src="/images/{{CarPics::whereAdvert_id($ad->id)->first()->image}}">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="well well-sm col-md-9">
                                <h4>{{$ad->title}}</h4>
                            </div>
                            <div class="well well-sm col-md-2 col-md-offset-1">
                                <h4>£{{$ad->price}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <ul class="list-group">
                                    <li class="list-group-item">Mileage: {{$ad->mileage}}</li>
                                    <li class="list-group-item">Fuel Type: {{$ad->fuel_type}}</li>
                                    <li class="list-group-item">Gear Box: {{$ad->gearbox}}</li>
                                    <li class="list-group-item">Engine Size: 3.4L</li>
                                </ul>
                            </div>
                            <div class="col-md-7">
                                <h5>Description:</h5>
                                <div class="well descriptionWell">
                                    <p>
                                        {{str_limit($ad->description, 150)}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 separator"></div>
            @endforeach

        @else
            <p>No results, sorry</p>
        @endif




@stop