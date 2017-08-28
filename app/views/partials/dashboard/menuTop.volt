<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class="navbar-brand">ASI<sup>2</sup> QUIZ</div>

</div>

<ul class="nav navbar-right top-nav">
    {#<li><a href="#" data-placement="bottom" data-toggle="tooltip" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i></a></li>#}
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ session.get('user')['firstName'] }} <b class="fa fa-angle-down"></b></a>
        <ul class="dropdown-menu">
            {#<li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>#}
            <li><a href="{{ url(['for': 'profile']) }}"><i class="fa fa-fw fa-cog"></i> Ustawienia</a></li>
            <li class="divider"></li>
            <li><a href="{{ url(['for': 'logout']) }}"><i class="fa fa-fw fa-power-off"></i> Wyloguj</a></li>

        </ul>
    </li>
</ul>