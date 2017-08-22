{% extends 'layouts/landing.volt' %}

{% block content %}
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix navbar-background">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                {{ link_to(["for": "homepage"], "ASI<sup>2</sup> QUIZ", "class" : "navbar-brand") }}
            </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll cpointer" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2>Rejestracja</h2>
                    <hr>
                    <p>Rejestracja da Ci Lorem Ipsum</p>

                    {{ flashSession.output() }}

                    <div>
                        <form id="register-form" method="post">
                            <div class="form-group">
                                <label for="first-name">Imię</label>
                                {{ registerForm.render("first-name", {"class": "form-control", "id": "first-name", "placeholder": "Imię", "autofocus" : true, "required" : true}) }}

                                {% for message in registerForm.getMessagesFor("first-name") %}
                                    <div class="error">{{ message }}</div>
                                {% endfor %}
                            </div>
                            <div class="form-group">
                                <label for="last-name">Nazwisko</label>
                                {{ registerForm.render("last-name", {"class": "form-control", "id": "last-name", "placeholder": "Nazwisko", "required" : true}) }}
                                {% for message in registerForm.getMessagesFor("last-name") %}
                                    <div class="error">{{ message }}</div>
                                {% endfor %}
                            </div>
                            <div class="form-group">
                                <label for="email">Adres E-mail</label>
                                {{ registerForm.render("email", {"class": "form-control", "id": "email", "placeholder": "E-mail", "required" : true}) }}
                                {% for message in registerForm.getMessagesFor("email") %}
                                    <div class="error">{{ message }}</div>
                                {% endfor %}
                            </div>
                            <div class="form-group">
                                <label for="password">Hasło</label>
                                {{ registerForm.render("password", {"class": "form-control", "id": "password", "placeholder": "Hasło", "required" : true}) }}
                                {% for message in registerForm.getMessagesFor("password") %}
                                    <div class="error">{{ message }}</div>
                                {% endfor %}
                            </div>
                            <div class="form-group">
                                <div class="button">{{ link_to(["for": "homepage"], "Powrót", "class": "btn btn-warning btn-xl") }}</div>
                                <div class="button"><button class="btn btn-primary btn-xl">Rejestracja</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="register-footer" class="footer navbar-fixed-bottom">
        <div class="container">
            <div class="row">
                <p class="text-center">Rejestrując się akceptujesz regulamin (którego nie ma)</p>
            </div>
        </div>
    </div>

    {{ partial('partials/loginModal') }}
{% endblock %}