{% for question in questions %}
    <div class="question-box">
        <div class="row">
            <div class="panel" style="background-color: gainsboro">
                <div class="panel-body">
                    <p>{{ question.question|escape }}</p>
                </div>
                <div class="panel-footer">
                    <span title="{{ question.rightAnswer }}" class="">{{ question.rightAnswer|length > 10 ? question.rightAnswer|slice(0, 10)|escape ~ '...' : question.rightAnswer|escape }}</span>
                    <span title="{{ question.wrongAnswer1 }}" class="">{{ question.wrongAnswer1|length > 10 ? question.rightAnswer|slice(0, 10)|escape ~ '...' : question.rightAnswer|escape }}</span>
                    <span title="{{ question.wrongAnswer2 }}" class="">{{ question.wrongAnswer2|length > 10 ? question.rightAnswer|slice(0, 10)|escape ~ '...' : question.rightAnswer|escape }}</span>
                    <span title="{{ question.wrongAnswer3 }}" class="">{{ question.wrongAnswer3|length > 10 ? question.rightAnswer|slice(0, 10)|escape ~ '...' : question.rightAnswer|escape }}</span>
                </div>
            </div>
        </div>
    </div>
{% endfor %}