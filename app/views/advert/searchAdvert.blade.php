@extends('layouts.main')

@section('content')


        @if($ads->count())

            @foreach($ads as $ad)
                <div class="row">
                    <div class="col-md-2 carAdImage">
                        <img class="img-responsive img-thumbnail" src="/images/{{CarPics::whereAdvert_id($ad->id)->first()->image}}">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-9">
                                <h4>{{$ad->title}}</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>£{{$ad->price}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-group catagoriesAd">
                                    <li class="list-group-item">Mileage: {{$ad->mileage}}</li>
                                    <li class="list-group-item">Fuel Type: {{$ad->fuel_type}}</li>
                                    <li class="list-group-item">Gear Box: {{$ad->gearbox}}</li>
                                    <li class="list-group-item">Engine Size: 3.4L</li>
                                </ul>
                            </div>
                            <div class="col-md-6 descriptionTitle">
                                <ul class="list-group catagoriesAd">
                                    <li class="list-group-item">Description:</li>
                                    <li class="list-group-item descriptionAd">
                                        {{str_limit($ad->description, 200)}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 adButtons">
                                <div class="btn-group-vertical">
                                    <a class="btn btn-default "><span class="glyphicon glyphicon-plus-sign"><span></a>
                                    <a class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 separator"></div>
            @endforeach

        <div class="col-md-12">{{$ads->appends(Request::except('page'))->links()}}</div>
        @else
            <p>No results, sorry</p>
        @endif
@stop