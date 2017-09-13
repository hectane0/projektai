{% extends 'layouts/dashboard.volt' %}

{% block content %}

<div class="row">
    <div class="container">
        <div class="time-counter">
            <div>Pozostało czasu: <b><span id="time"></span></b></div>
            <script>
                $(document).ready(function () {
                    function startTimer(finishTime, display) {
                        var minutes, seconds;
                        setInterval(function () {

                            var dateTime = Date.now();
                            var timestamp = Math.floor(dateTime / 1000);

                            var timer = finishTime - timestamp;

                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;

                            display.text(minutes + ":" + seconds);

                            if (--timer < 0) {
                                timer = finishTime;
                                $("#quiz-form").submit();
                            }
                        }, 1000);
                    }

                    $(function ($) {
                        startTimer({{ finishTime }}, $('#time'));
                    });
                })
            </script>
        </div>
    </div>
</div>

<div id="first-slider">
    <form action="{{ url(["for": "panel-quiz-finish"]) }}" method="post" id="quiz-form">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <ol class="carousel-indicators">

            {% for question in questions %}
            <li data-target="#carousel-example-generic" data-slide-to="{{ loop.index0 }}" {% if loop.first %}class="active"{% endif %}></li>
            {% endfor %}
        </ol>


        <div class="carousel-inner" role="listbox">
            {% for question in questions %}
            <div class="item {% if loop.first %}active{% endif %} slide{{ loop.index }}">
                <div class="row">
                    <div class="container question-box">
                        <div class="question">
                            {{ question['question']|escape }}
                        </div>
                        <div class="answers-box">
                            {% for key, answer in question['answers'] %}
                                <div class="radio">
                                    <label><input type="radio" value="{{ key }}" name="{{ question['id'] }}">{{ answer|escape }}</label>
                                </div>
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>

        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>

        <div class="text-center quiz-button-box">
            <button class="btn btn-xl btn-primary quiz-button" type="submit">Zakończ</button>
        </div>

    </form>
</div>


{% endblock %}
