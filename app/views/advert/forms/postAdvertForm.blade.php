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
        <div class="col-md-9">
            <div class="panel productNameAndPrice">
                <div class="panel-body">
                    <h3>
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) }}
                        <span></span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
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
        <div class="col-md-6">
<!--     To be added if multiple picture needed     ['multiple' => true])-->

            {{Form::file('image', ['id' => 'uploadImage', 'onchange' => 'PreviewImage();'])}}
            <img id="uploadPreview" style="width: 455px; height: 343px;" />
            <script type="text/javascript">

                function PreviewImage() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                    oFReader.onload = function (oFREvent) {
                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                    };
                };

            </script>




        </div>
        <div class="col-md-3">
            <div class="interactionInfo">
                <p>Created: </p>
                <p>Last Updated: </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default productDetails">
                        <div class="panel-heading"><h5>Vechicle Specification</h5></div>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Make :</strong> {{ Form::text('make', null, ['class'=>'form-control', 'placeholder'=>'Make']) }}</li>
                            <li class="list-group-item"><strong>Model :</strong> {{ Form::text('model', null, ['class'=>'form-control', 'placeholder'=>'Model']) }}</li>
                            <li class="list-group-item"><strong>Colour :</strong> {{ Form::text('colour', null, ['class'=>'form-control', 'placeholder'=>'Colour']) }}</li>
                            <li class="list-group-item"><strong>Transmission :</strong>  {{ Form::text('gearbox', null, ['class'=>'form-control', 'placeholder'=>'Gearbox']) }}</li>
                            <li class="list-group-item"><strong>Mileage :</strong> {{ Form::text('mileage', null, ['class'=>'form-control', 'placeholder'=>'Mileage']) }}</li>
                            <li class="list-group-item"><strong>Fuel Type :</strong>  {{ Form::text('fuel_type', null, ['class'=>'form-control', 'placeholder'=>'Fuel type']) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="well descriptionWell">
                <h4>Description:</h4>
                <p>
                    {{ Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Vehicle description']) }}
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ Form::submit('Post Ad!',['class' => 'btn btn-primary pull-right']); }}
        </div>
    </div>

{{Form::close()}}