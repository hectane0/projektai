{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <table id="users-table" class="display datatables" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% for user in users %}
        <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.firstName|escape }}</td>
            <td>{{ user.lastName|escape }}</td>
            <td><a href="{{ url(["for" : "admin-user", "id" : user.id]) }}">Więcej</a></td>
        </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
