<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ tag.getTitle() }}
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
        {% block extraHead %}{% endblock %}
        {{ assets.outputCss() }}
    </head>
    <body id="page-top" class="home">
        {% block content %}{% endblock %}
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        {% block extraJs %}{% endblock %}
        {{ assets.outputJs() }}
    </body>
</html>
