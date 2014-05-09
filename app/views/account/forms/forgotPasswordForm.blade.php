{{ Form::open([ 'url' => URL::route('account_forgot_password'), 'method' => 'POST', 'class'=>'form-signup' ]) }}
    <h2 class="form-signup-heading">Forgot Password</h2>

    <div class="form-horizontal">
        <!-- Email field -->
        @if($errors->has('email'))
        <div class="form-group has-error has-feedback">
            <div class="col-xs-12">
                {{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Please Enter Email e.g. something@example.com']) }}
                <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('email') }}"></button>
            </div>
        </div>
        @else
        <div class="form-group">
            <div class="col-xs-12">
                {{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Please Enter Email e.g. something@example.com']) }}
            </div>
        </div>
        @endif


        <div class="form-group">
            <div class="col-xs-12">
                {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
            </div>
        </div>
    </div>
{{ Form::close() }}