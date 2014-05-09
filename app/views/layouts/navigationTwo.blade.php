
<div class="navbar navbar-default navbar2">

    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>{{ HTML::link(URL::route('home') , 'Buying', ['class' => '']) }}</li>
            <li>{{ HTML::link(URL::route('get_postad') , 'Selling', ['class' => '']) }}</li>
            <li>{{ HTML::link(URL::route('ad_compare_view') , 'Comparison', ['class' => '']) }}</li>
        </ul>
    </div>

</div>