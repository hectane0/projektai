<ul class="nav navbar-nav side-nav">
    <li>
        <a href="{{ url(["for" : "panel"]) }}"><i class="fa fa-fw fa-user"></i> Podsumowanie</a>
    </li>
    <li>
        <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-question"></i>  Quizy <i class="fa fa-fw fa-angle-down pull-right"></i></a>
        <ul id="submenu-2" class="collapse">
            <li><a href="{{ url(["for": "panel-quiz-available"]) }}"><i class="fa fa-angle-double-right"></i> Dostępne</a></li>
            <li><a href="{{ url(["for": "panel-quiz-finished"]) }}"><i class="fa fa-angle-double-right"></i> Zakończone</a></li>
        </ul>
    </li>
</ul>