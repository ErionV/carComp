<!--Shows all form validation errors if any-->
@if($errors->has())
<div id="notificationMessage" class="alert-info alert">
	<h3 class="glyphicon glyphicon-pencil"></h3>
	<strong>PLEASE CHECK FORM INPUT</strong>
	<ol>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ol>

</div>
@endif


<!--This is the form for uploading a new advert-->
{{ Form::open(['route' => 'post_postad', 'method' => 'POST', 'files' => true, 'class'=>'form-signup']) }}
<div class="row">
	<div class="col-xs-9">
		<div class="panel productNameAndPrice">
			<div class="panel-body">
				<h3>
					{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
				</h3>
			</div>
		</div>
	</div>

	<div class="col-xs-3">
		<div class="panel productNameAndPrice">
			<div class="panel-body">
				<h3 class="text-center">
					{{ Form::text('price', null, ['class'=>'form-control', 'placeholder'=>'Price']) }}
				</h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-6">
		<!--     To be added if multiple picture needed     ['multiple' => true])-->

		<img id="uploadPreview" style="width: 455px; height: 343px;"/>


	</div>
	<div class="col-xs-3">
		<div class="interactionInfo">
			<p>Created: </p>

			<p>Last Updated: </p>
		</div>
	</div>
	<div class="col-xs-3">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default productDetails">
					<div class="panel-heading"><h5>Vechicle Specification</h5></div>
					<ul class="list-group postAdsInputs">
						<li class="list-group-item">
							<label class="col-xs-4">Make:</label>
							<div class="col-xs-8 makeFormControl">
								{{ Form::select('make', $car_make_list, null,['class' => 'form-control']) }}
							</div>
						</li>
						<li class="list-group-item">
							<label class="col-xs-4">Make: </label>
							<div class="col-xs-8">
								{{ Form::text('model', null, ['class'=>'form-control', 'placeholder'=>'Model']) }}
							</div>
						</li>
						<li class="list-group-item">
							<label class="col-xs-4">Colour:</label>
							<div class="col-xs-8">
								{{ Form::text('colour', null, ['class'=>'form-control', 'placeholder'=>'Colour']) }}
							</div>
						</li>
						<li class="list-group-item">
							<label class="col-xs-4">Transmission:</label>
							<div class="col-xs-8">
								{{ Form::text('gearbox', null, ['class'=>'form-control', 'placeholder'=>'Gearbox']) }}
							</div>
						</li>
						<li class="list-group-item">
							<label class="col-xs-4">Mileage:</label>
							<div class="col-xs-8">
								{{ Form::text('mileage', null, ['class'=>'form-control', 'placeholder'=>'Mileage']) }}
							</div>
						</li>
						<li class="list-group-item">
							<label class="col-xs-4">Fuel Type:</label>
							<div class="col-xs-8">
								{{ Form::text('fuel_type', null, ['class'=>'form-control', 'placeholder'=>'Fuel type']) }}
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="fileUpload btn btn-primary">
		<span>Choose Image</span>
		{{Form::file('image', ['class' => 'upload', 'id' => 'uploadImage', 'onchange' => 'PreviewImage();'])}}
	</div>
</div>

<div class="row">
	<div class="col-xs-9">
		<div class="well descriptionWell">
			<h4>Description:</h4>

			<p>
				{{ Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Vehicle description'])}}
			</p>
		</div>
	</div>
	<div class="col-xs-3">
		{{ Form::submit('Post Ad!',['class' => 'btn btn-primary pull-right submitBut']); }}
	</div>
</div>


{{Form::close()}}