{% extends 'index.volt' %}

{% block navbar %}
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        {{ partial('partials/dashboard/menuTop') }}

        <div class="collapse navbar-collapse navbar-ex1-collapse">

            {% if session.get('user')['roles'] == 'admin'  %}
                {{ partial('partials/dashboard/menuLeftAdmin') }}
            {% else %}
                {{ partial('partials/dashboard/menuLeft') }}
            {% endif %}


        </div>
    </nav>
{% endblock %}

{% block content %}{% endblock %}

{% block footer %}{% endblock %}