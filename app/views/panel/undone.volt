{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <h4>Nie możesz rozpocząć nowego quizu jeśli nie zakończyłeś poprzedniego</h4>

    <a href="{{ url(["for": "panel"]) }}">Powrót</a>
{% endblock %}
