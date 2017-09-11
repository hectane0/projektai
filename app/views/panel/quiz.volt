{% extends 'layouts/dashboard.volt' %}

{% block content %}

<div class="row">
    <div class="container">
        Info
    </div>
</div>

<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <ol class="carousel-indicators">

            {% for question in questions %}
            <li data-target="#carousel-example-generic" data-slide-to="{{ loop.index0 }}" {% if loop.first %}class="active"{% endif %}></li>
            {% endfor %}
        </ol>

        <form method="post">
        <div class="carousel-inner" role="listbox">
            {% for question in questions %}
            <div class="item {% if loop.first %}active{% endif %} slide{{ loop.index }}">
                <div class="row">
                    <div class="container question-box">
                        <div class="question">
                            {{ question['question'] }}
                        </div>
                        <div class="answers-box">
                            {% for key, answer in question['answers'] %}
                                <div class="radio">
                                    <label><input type="radio" value="{{ key }}" name="{{ question['id'] }}">{{ answer }}</label>
                                </div>
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
        </form>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
</div>


{% endblock %}
