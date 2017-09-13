{% extends 'layouts/profile.volt' %}

{% block content %}
<p>Imię: {{ user.firstName|escape }}</p>
<p>Nazwisko: {{ user.lastName|escape }}</p>
<p>E-mail: {{ user.email }}</p>
{% endblock %}
