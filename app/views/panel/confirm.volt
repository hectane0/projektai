{% extends 'layouts/dashboard.volt' %}

{% block content %}

    <h2>Czy jesteś pewny?</h2>

    <p>Bla bla bla</p>

    <form method="post" action="{{ url(["for": "panel-quiz"]) }}">
        <input type="hidden" name="id" value="{{ id }}">
        <button type="button" class="btn btn-danger">Nie</button>
        <button type="submit" class="btn btn-primary">Tak, jak nigdy</button>
    </form>


{% endblock %}
