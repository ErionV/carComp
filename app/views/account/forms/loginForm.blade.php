<!-- START Log in form -->
{{ Form::open([ 'url' => URL::route('account_login_post'), 'method' => 'POST', 'class'=>'form-signup' ]) }}
<h2 class="form">Login</h2>

<div class="form-horizontal">
    <!-- Username field -->
    @if($errors->has('username'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'UserName']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('username') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'UserName']) }}
        </div>
    </div>
    @endif

    <!-- Password field -->
    @if($errors->has('password'))
    <div class="form-group has-error has-feedback">
        <div class="col-md-12">
            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
            <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('password') }}"></button>
        </div>
    </div>
    @else
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
        </div>
    </div>
    @endif

    <!-- Remember me checkbox -->
    <div class="form-group">
        <div class="col-md-12">
            {{ Form::checkbox('remember') }}
            {{ Form::label('remember', 'Remember me') }}
        </div>
    </div>

    <!-- Submission button -->
    <div class="form-group">
        <div class="col-md-6">
            {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            {{ HTML::link(URL::route('account_forgot_password'), 'Forgot Password', ['class' => 'btn btn-large btn-primary btn-block'])}}
        </div>
    </div>
</div>

{{ Form::close() }}
<!-- STOP login form -->