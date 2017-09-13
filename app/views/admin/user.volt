{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <p>Imię: {{ user.firstName|escape }}</p>
    <p>Nazwisko: {{ user.lastName|escape }}</p>
    <p>E-mail: {{ user.email|escape }}</p>
    <p>Zarejestrowany: {{ user.createdAt }}</p>
{% endblock %}
