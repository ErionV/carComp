@extends('layouts.main')

@section('content')

            <div class="col-md-4 well">
                <div class="row">
                    <div class="col-md-6 form-group">
                       <input type="" class="form-control" placeholder="Postcode">
                    </div>

                    <div class="col-md-6 form-group">
                        <select class="form-control">
                            <option>Distance (Miles)</option>
                            <option>1</option>
                            <option>2</option>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>30</option>
                            <option>50</option>
                            <option>70</option>
                            <option>100</option>
                            <option>150</option>
                            <option>200</option>
                            <option>National</option>
                        </select>
                    </div>

                    <div class="col-md-12 form-group">
                        {{ Form::select('car_make', $car_make_list, Input::old('car_make'), ['class' => 'form-control']) }}
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {{ Form::select('car_model', $car_model_list, Input::old('car_model'), ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::text('minPrice', null, ['class' => 'form-control', 'placeholder' => 'Min Price (£)']) }}
                    </div>
                    <div class="col-md-6 form-group">
                        {{ Form::text('maxPrice', null, ['class' => 'form-control', 'placeholder' => 'Max Price (£)']) }}
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-primary form-group col-md-12">Search</button>

            </div>
            <div class="col-md-8 lamboTemp">
                <img src="http://4.bp.blogspot.com/-_ceG8hWuOZQ/TyYtLKLvVFI/AAAAAAAAB9k/LP7wBDzkccc/s1600/lamborghini-aventador+6.jpg">
                <div class="caption_onLambo">
                    <h3>Buying and selling</h3>
                </div>
            </div>


@stop