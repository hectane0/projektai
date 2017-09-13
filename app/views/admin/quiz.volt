{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <table id="users-table" class="display datatables" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Typ</th>
            <th>Kategoria</th>
            <th>Czas trwania</th>
            <th>Stworzony</th>
        </tr>
        </thead>
        <tbody>
        {% for quiz in quizzes %}
            <tr>
                <td>{{ quiz.name }}</td>
                <td>{% if quiz.type == 'public' %}Publiczny{% elseif quiz.type == 'closed' %}Na zaproszenie{% endif %}</td>
                <td>{{ quiz.category }}</td>
                <td>{{ quiz.duration }}</td>
                <td>{{ quiz.createdAt }}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
