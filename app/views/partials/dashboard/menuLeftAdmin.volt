<ul class="nav navbar-nav side-nav">
    <li>
        <a href="{{ url(["for" : "admin-users"]) }}"><i class="fa fa-fw fa-user"></i> Użytkownicy</a>
    </li>
    <li>
        <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-question"></i>  Pytania <i class="fa fa-fw fa-angle-down pull-right"></i></a>
        <ul id="submenu-2" class="collapse">
            <li><a href="{{ url(["for" : "admin-questions-add"]) }}"><i class="fa fa-angle-double-right"></i> Dodaj nowe</a></li>
            <li><a href="{{ url(["for" : "admin-questions"]) }}"><i class="fa fa-angle-double-right"></i> Wszystkie</a></li>
        </ul>
    </li>
    <li>
        <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-key"></i>  Quizy <i class="fa fa-fw fa-angle-down pull-right"></i></a>
        <ul id="submenu-3" class="collapse">
            <li><a href="{{ url(["for" : "admin-quiz-add-1"]) }}"><i class="fa fa-angle-double-right"></i> Dodaj nowy</a></li>
            <li><a href="{{ url(["for" : "admin-results"]) }}"><i class="fa fa-angle-double-right"></i> Wyniki</a></li>
            <li><a href="{{ url(["for" : "admin-quiz"]) }}"><i class="fa fa-angle-double-right"></i> Wszystkie</a></li>
        </ul>
    </li>
</ul>