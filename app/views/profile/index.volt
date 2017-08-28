{% extends 'layouts/profile.volt' %}

{% block content %}
<p>Imię: {{ user.firstName }}</p>
<p>Nazwisko: {{ user.lastName }}</p>
<p>E-mail: {{ user.email }}</p>
{% endblock %}
