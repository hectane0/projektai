{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <table id="users-table" class="display datatables" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Quiz</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Status</th>
            <th>Zakończono</th>
            <th>Rezultat</th>
            <th>Informacja</th>
        </tr>
        </thead>
        <tbody>
        {% for result in results %}
            <tr>
                <td>{{ result['name']|escape }}</td>
                <td>{{ result['firstName']|escape }}</td>
                <td>{{ result['lastName']|escape }}</td>
                <td>{% if result['status'] == 'done' %}Wykonany{% elseif result['status'] == 'in_progress' %}W trakcie{% endif %}</td>
                <td>{{ result['finishedAt'] }}</td>
                <td>{{ result['result'] }}</td>
                <td>{{ result['info'] }}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
