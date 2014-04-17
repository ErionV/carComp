{{ Form::open([ 'url' => URL::route('account_change_password_post'), 'method' => 'POST', 'class'=>'form-signup' ]) }}
    <h2 class="form-signup-heading">Change Password</h2>

    <div class="form-horizontal">
        <!-- Email field -->
        @if($errors->has('old_password'))
        <div class="form-group has-error has-feedback">
            <div class="col-md-12">
                {{ Form::password('old_password', ['class'=>'form-control', 'placeholder'=>'You current Password']) }}
                <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('old_password') }}"></button>
            </div>
        </div>
        @else
        <div class="form-group">
            <div class="col-md-12">
                {{ Form::password('old_password', ['class'=>'form-control', 'placeholder'=>'You current Password']) }}
            </div>
        </div>
        @endif

        <!-- Email field -->
        @if($errors->has('password'))
        <div class="form-group has-error has-feedback">
            <div class="col-md-12">
                {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'New Password']) }}
                <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('password') }}"></button>
            </div>
        </div>
        @else
        <div class="form-group">
            <div class="col-md-12">
                {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'New Password']) }}
            </div>
        </div>
        @endif


        <!-- Email field -->
        @if($errors->has('password_again'))
        <div class="form-group has-error has-feedback">
            <div class="col-md-12">
                {{ Form::password('password_again', ['class'=>'form-control', 'placeholder'=>'New Password Again']) }}
                <button type="button" class="glyphicon glyphicon-remove form-control-feedback form_error" data-toggle="tooltip" data-placement="right" title="{{ $errors->first('password_again') }}"></button>
            </div>
        </div>
        @else
        <div class="form-group">
            <div class="col-md-12">
                {{ Form::password('password_again', ['class'=>'form-control', 'placeholder'=>'New Password Again']) }}
            </div>
        </div>
        @endif

        <div class="form-group">
            <div class="col-md-12">
                {{ Form::submit('Change Password', array('class'=>'btn btn-large btn-primary btn-block'))}}
            </div>
        </div>
    </div>
{{ Form::close() }}