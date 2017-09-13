{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <div>
        {% if inProgress is not empty %}
            <div class="quiz-alert">
                <form action="{{ url(["for": "panel-quiz"]) }}" method="post">
                    <input type="hidden" name="id" value="{{ inProgress.quizId }}">
                    <button class="btn btn-danger" type="submit">Istnieje rozpoczęty quiz! Przejdź</button>
                </form>
            </div>
        {% endif %}

        <p>Liczba publicznych quizów które możesz wykonać: {{ public }}</p>
        <p>Liczba prywatnych quizów które możesz wykonać: {{ invited }}</p>
    </div>

    <div>
        <a href="{{ url(["for": "panel-quiz-available"]) }}">Zobacz wszystkie</a>
    </div>

{% endblock %}
