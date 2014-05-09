@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            <div class="panel productNameAndPrice">
                <div class="panel-body">
                    <h3>{{ $advert->title }}</h3>
                </div>
            </div><!--End productNameAndPrice-->
        </div><!--End col-xs-9-->

        <div class="col-xs-3">
            <div class="panel productNameAndPrice" ng-app="myApp">
                <div class="panel-body" ng-app="myController">
                    <h3 class="text-center">£{{ $advert->price }}</h3>
                </div>
            </div><!--End productNameAndPrice-->
        </div><!--End col-xs-3-->
    </div><!--End row-->

    <div class="row">
        <div class="col-xs-6">
            <img class="img-responsive img-thumbnail" src="/images/{{$image->image}}" style="width: 455px; height: 343px;>
        </div>

        <div class="col-xs-3">
            <div class="interactionInfo">
                <p>Created: {{$advert->created_at}}</p>
                <p>Last Updated: {{$advert->updated_at}}</p>
            </div>
        </div><!--End col-xs-2-->
        <div class="col-xs-3 col-xs-offset-3">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default productDetails">
                        <div class="panel-heading"><h5>Vechicle Specification</h5></div>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Make :</strong> {{ $advert->make }}</li>
                            <li class="list-group-item"><strong>Model :</strong> {{ $advert->model }}</li>
                            <li class="list-group-item"><strong>Colour :</strong> {{$advert->colour}}</li>
                            <li class="list-group-item"><strong>Transmission :</strong> {{$advert->gearbox}}</li>
                            <li class="list-group-item"><strong>Mileage :</strong> {{$advert->mileage}} miles</li>
                            <li class="list-group-item"><strong>Fuel Type :</strong> {{$advert->fuel_type}}</li>
                        </ul>
                    </div><!--End panel-->
                </div><!--End col-xs-6-->
            </div><!--End row-->
        </div><!--End col-xs-5-->
    </div><!--End row-->

    <div class="row">
        <div class="col-xs-9">
            <div class="well descriptionWell">
                <h4>Description:</h4>
                <p>
                    {{$advert->description}}
                </p>
            </div>
        </div><!--End col-xs-4-->
        <div class="col-xs-3">

                @if(isset($dealer))
	        <div class="well descriptionWell">
		            <h4>Dealer: </h4><p>{{$dealer->company_name}}</p>
	                <h4>Contact: </h4><p>{{$dealer->contact_number}}</p>
	                @if($dealer->website != null)
	                    <h4>Website: </h4><p>{{$dealer->website}}</p>
	                @endif
	                <h4>About: </h4>
		            <p>
			            {{$dealer->about}}
		            </p>
	            @elseif(isset($user))
			        <div class="well descriptionWell">
		            <h4>User:</h4><p>{{$user->username}}</p>
	                <h4>Contact Email: </h4><p>{{$user->email}}</p>
	            @else
				<div>
	            @endif
            </div>
        </div>
    </div><!--End row-->
@stop
