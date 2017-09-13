{% extends 'layouts/dashboard.volt' %}

{% block content %}
    {% for result in results %}
        <p>{{ result['name'] }}: <b>{{ result['result'] }}</b> Wykonano: {{ result['finishedAt'] }} {% if result['info'] is not empty %}({{ result['info'] }}){% endif %}</p>
    {% endfor %}

{% endblock %}
