{% extends 'layouts/dashboard.volt' %}

{% block content %}

    <p>Twój wynik: {{ score }}</p>

    <a href="{{ url(['for': 'panel-quiz-available']) }}"><button class="btn btn-primary">Inne dostępne quizy</button></a>

{% endblock %}
