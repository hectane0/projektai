{% extends 'index.volt' %}

{% block content %}
<div class="error">
    <div class="error-code m-b-10 m-t-20">404<i class="fa fa-warning"></i></div>
    <hr>
    <h3 class="font-bold">Nie znaleziono strony</h3>

    <div class="error-desc">
        Przykro nam, ale nie udało się odnaleźć tego zasobu
        <div>
            <a class=" login-detail-panel-button btn" href="/">
                <i class="fa fa-arrow-left"></i>
                Powrót na stronę główną
            </a>
        </div>
    </div>
</div>
{% endblock %}