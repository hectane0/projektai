{% extends 'layouts/dashboard.volt' %}

{% block content %}
    {% if quizzesInvited is not null %}
    <h4>Dostępne quizy zamknięte:</h4>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kategoria</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                {% for quiz in quizzesInvited %}
                <tr>
                    <td>{{ quiz.name }}</td>
                    <td>{{ quiz.category }}</td>
                    <td><a href="{{ url(["for" : "panel-quiz-confirm", "id" : quiz.id]) }}">Przystąp</a></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>

    </div>
    {% endif %}

    {% if quizzesPublic is not null %}
    <h4>Dostępne quizy publiczne:</h4>
    <div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kategoria</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            {% for quiz in quizzesPublic %}
                <tr>
                    <td>{{ quiz.name }}</td>
                    <td>{{ quiz.category }}</td>
                    <td><a href="{{ url(["for" : "panel-quiz-confirm", "id" : quiz.id]) }}">Przystąp</a></td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
{% endif %}

{% endblock %}
