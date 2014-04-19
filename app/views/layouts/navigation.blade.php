<div class="navbar navbar-default navbar1">

<div class="container">
        <div class="col-xs-2">
            <ul class="nav navbar-nav navbar-left">
                <li>{{ HTML::link(URL::route('home'), 'carComp', ['class' => 'navbar-brand logo']) }}</li>
            </ul>

        </div>

        <div class="col-xs-8">
            <form class="navbar-form text-center" role="search">
                <div class="form-group">
                    {{ Form::open(['action' => 'SearchController@getSearch', 'method' => 'GET']) }}
                        {{ Form::input('search', 's', null, ['class' => 'form-control', 'id' => 'search_bar', 'placeholder' => 'Search...']) }}
                        {{ Form::submit('Search',['class' => 'btn btn-primary pull-right']); }}
                    {{ Form::close() }}
                </div>
            </form>
        </div>

        <div class="col-xs-1">
            @if(Auth::check())
                <p class="username_nav">{{ HTML::link('user/'.Auth::user()->username, Auth::user()->username, ['class' => '']) }}</p>

                <div id="popover-content" style="display: none">
                    <p class="login_nav">{{ HTML::link(URL::route('get_postad') , 'Post Ad', ['class' => '']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('account_change_password') , 'Change Password', ['class' => '']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('account_logout'), 'Logout', ['class' => '']) }}</p>
                </div>
            @else
                <p class="login_nav">{{ HTML::link(URL::route('account_login'), 'Login', ['class' => '']) }}</p>
                <p class="login_nav">{{ HTML::link(URL::route('account_register'), 'Register', ['class' => '']) }}</p>
            @endif
        </div>

        <div class="col-xs-1">
            <a rel="popover" type="button" class="glyphicon glyphicon-cog navbar-right options_nav"  data-placement="bottom"></a>
        </div>
    </div>
</div>
