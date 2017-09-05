{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <div>
        <p>Liczba publicznych quizów które możesz wykonać: {{ public }}</p>
        <p>Liczba prywatnych quizów które możesz wykonać: {{ invited }}</p>
    </div>

    <div>
        <a href="{{ url(["for": "panel-quiz-available"]) }}">Zobacz wszystkie</a>
    </div>

{% endblock %}
