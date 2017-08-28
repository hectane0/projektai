{% extends 'index.volt' %}

{% block navbar %}
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        {{ partial('partials/dashboard/menuTop') }}

        <div class="collapse navbar-collapse navbar-ex1-collapse">

            {{ partial('partials/dashboard/menuProfile') }}

        </div>
    </nav>
{% endblock %}

{% block content %}{% endblock %}

{% block footer %}{% endblock %}