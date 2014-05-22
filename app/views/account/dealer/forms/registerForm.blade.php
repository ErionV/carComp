<!-- START Registration form -->
{{ Form::open([ 'url' => URL::route('dealer_register_post'), 'method' => 'POST', 'class'=>'form-signup' ]) }}
<h2 class="form-signup-heading">Dealer Register</h2>

<div class="form-horizontal">

    <!-- Email field -->
    @if($errors->has('email'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('email') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address']) }}
        </div>
    </div>
    @endif

    <!-- Username field -->
    @if($errors->has('username'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'User Name']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('username') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'User Name']) }}
        </div>
    </div>
    @endif

    <!-- Username field -->
    @if($errors->has('company_name'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('company_name') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) }}
        </div>
    </div>
    @endif

    <!-- Username field -->
    @if($errors->has('company_number'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('company_number', null, ['class' => 'form-control', 'placeholder' => 'Company Number']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('company_number') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('company_number', null, ['class' => 'form-control', 'placeholder' => 'Company Number']) }}
        </div>
    </div>
    @endif

    <!-- Username field -->
    @if($errors->has('contact_number'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' => 'Company contact number']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('contact_number') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' => 'Company contact number']) }}
        </div>
    </div>
    @endif

    <!-- Username field -->
    @if($errors->has('post_code'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('post_code', null, ['class' => 'form-control', 'placeholder' => 'Company Postal Code']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('post_code') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('post_code', null, ['class' => 'form-control', 'placeholder' => 'Company Postal Code']) }}
        </div>
    </div>
    @endif


    <!-- Username field -->
    @if($errors->has('about'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::textarea('about', null, ['class' => 'form-control', 'placeholder' => 'About your company']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('about') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::textarea('about', null, ['class' => 'form-control', 'placeholder' => 'About your company']) }}
        </div>
    </div>
    @endif

    <!-- Username field -->
    @if($errors->has('website'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Company Website']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('website') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Company Website']) }}
        </div>
    </div>
    @endif

    <!-- Password field -->
    @if($errors->has('password'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('password') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
        </div>
    </div>
    @endif

    <!-- Password again field -->
    @if($errors->has('password_again'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::password('password_again', ['class' => 'form-control', 'placeholder' => 'Password Again']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('password_again') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::password('password_again', ['class' => 'form-control', 'placeholder' => 'Password Again']) }}
        </div>
    </div>
    @endif

    <div class="form-group">
        <div class="col-md-12">
            {{ Form::submit('Register', array('class' => 'btn btn-large btn-primary btn-block'))}}
        </div>
    </div>
</div>

{{ Form::close() }}
<!-- STOP Registration form -->