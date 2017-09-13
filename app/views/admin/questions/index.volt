{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <table id="users-table" class="display datatables" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Pytanie</th>
            <th>Poprawna odpowiedź</th>
            <th>Błędna odpowiedź</th>
            <th>Błędna odpowiedź</th>
            <th>Błędna odpowiedź</th>
            <th>Kategoria</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% for question in questions %}
            <tr>
                <td>{{ question.question|length > 20 ? question.question|slice(0, 20)|escape ~ '...' : question.question|escape }}</td>
                <td>{{ question.rightAnswer|length > 20 ? question.rightAnswer|slice(0, 20)|escape ~ '...' : question.rightAnswer|escape }}</td>
                <td>{{ question.wrongAnswer1|length > 20 ? question.wrongAnswer1|slice(0, 20)|escape ~ '...' : question.wrongAnswer1|escape }}</td>
                <td>{{ question.wrongAnswer2|length > 20 ? question.wrongAnswer2|slice(0, 20)|escape ~ '...' : question.wrongAnswer2|escape }}</td>
                <td>{{ question.wrongAnswer3|length > 20 ? question.wrongAnswer3|slice(0, 20)|escape ~ '...' : question.wrongAnswer3|escape }}</td>
                <td>{{ question.category }}</td>
                <td><a href="{{ url(["for" : "admin-questions-edit", "id" : question.id]) }}">Edytuj</a></td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
