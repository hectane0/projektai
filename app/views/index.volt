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
        <script src="/vendor/jquery/jquery.min.js"></script>
    </head>
    <body id="page-top" class="home">

    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">

        {% block navbar %}{% endblock %}

        <div id="page-wrapper">
            <div class="container-fluid">
                {% block content %}{% endblock %}
            </div>
        </div>
    </div>


        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        {% block extraJs %}{% endblock %}
        {{ assets.outputJs() }}
    </body>
</html>
