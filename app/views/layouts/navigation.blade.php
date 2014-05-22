<div class="navbar navbar-default navbar1">

<div class="container">
        <div class="col-xs-2 visible-xs">
            <ul class="nav navbar-nav navbar-left">
                <li>{{ HTML::link(URL::route('home'), 'carComp', ['class' => 'navbar-brand logoSm']) }}</li>
            </ul>

        </div>
        <div class="col-xs-2 hidden-xs">
            <ul class="nav navbar-nav navbar-left">
                <li>{{ HTML::link(URL::route('home'), 'carComp', ['class' => 'navbar-brand logo']) }}</li>
            </ul>

        </div>

        <div class="col-xs-7">
            {{ Form::open(['action' => 'ad_search', 'method' => 'GET', 'class' => 'navbar-form text-center']) }}
                <div class="form-group">
                        {{ Form::input('search', 's', null, ['class' => 'form-control', 'id' => 'search_bar', 'placeholder' => 'Search...']) }}

                </div>
                <div class="form-group form-inline">
                    {{ Form::submit('Search',['class' => 'btn btn-primary pull-right hidden-sm hidden-xs']); }}
                </div>
            {{ Form::close() }}
        </div>

            @if(Auth::check())
                <div class="hidden-xs col-xs-1 col-xs-offset-1">
                    <p class="username_nav">{{ HTML::link(URL::route('profile_user') , Auth::user()->username, ['class' => '']) }}</p>

                    <div id="popover-content" style="display: none">
                        <p class="login_nav">{{ HTML::link(URL::route('get_postad') , 'Post Ad', ['class' => '']) }}</p>
                        <p class="login_nav">{{ HTML::link(URL::route('get_watchList') , 'Watch List', ['class' => '']) }}</p>
                        <p class="login_nav">{{ HTML::link(URL::route('account_change_password') , 'Change Password', ['class' => '']) }}</p>
                        <p class="login_nav">{{ HTML::link(URL::route('account_logout'), 'Logout', ['class' => '']) }}</p>
                    </div>
                </div>
                <div class="col-xs-1">
                    <a rel="popover" type="button" class="glyphicon glyphicon-cog navbar-right options_nav"  data-placement="bottom"></a>
                </div>
            @else
                <div class="col-xs-1 hidden-xs">
                    <p class="login_nav">{{ HTML::link(URL::route('dealer_register') , 'Dealer Register', ['class' => 'hidden-xs']) }}</p>
                </div>

                <div class="col-xs-1 hidden-xs">
                    <p class="login_nav">{{ HTML::link(URL::route('account_login'), 'Login', ['class' => 'hidden-xs']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('account_register'), 'Register', ['class' => 'hidden-xs']) }}</p>
                </div>

                <div id="popover-content" style="display: none">
                    <p class="login_nav">{{ HTML::link(URL::route('home') , 'Buying', ['class' => '']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('ad_compare_view') , 'Comparison', ['class' => '']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('account_login'), 'Login', ['class' => 'visible-xs']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('account_register'), 'Register', ['class' => 'visible-xs']) }}</p>
                    <p class="login_nav">{{ HTML::link(URL::route('dealer_register') , 'Dealer Register', ['class' => 'visible-xs']) }}</p>
                </div>

                <div class="col-xs-1">
                    <a rel="popover" type="button" class="glyphicon glyphicon-cog navbar-right options_nav"  data-placement="bottom"></a>
                </div>

            @endif


    </div>
</div>
