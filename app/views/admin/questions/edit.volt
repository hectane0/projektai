{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <div class="col-md-5">
        <div class="container-fluid">
            <h3>Edytuj pytanie</h3>

            <form method="post" id="new-question">

                <div class="form-group">
                    <label for="password">Pytanie</label>
                    {{ form.render("question", {"class": "form-control", "id": "question", "placeholder": "Pytanie", 'value': question.question, "autofocus" : true, "required" : true}) }}

                    {% for message in form.getMessagesFor("question") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group has-success">
                    <label for="new-password">Poprawna odpowiedź</label>
                    {{ form.render("right-answer", {"class": "form-control form-control-success", "id": "right-answer", "placeholder": "Poprawna odpowiedź", 'value': question.rightAnswer, "required" : true}) }}

                    {% for message in form.getMessagesFor("right-answer") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group has-error">
                    <label for="re-new-password">Błędna odpowiedź</label>
                    {{ form.render("wrong-answer1", {"class": "form-control form-control-danger", "id": "wrong-answer1", "placeholder": "Błędna odpowiedź", 'value': question.wrongAnswer1, "required" : true}) }}

                    {% for message in form.getMessagesFor("wrong-answer1") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>
                <div class="form-group has-error">
                    <label for="re-new-password">Błędna odpowiedź</label>
                    {{ form.render("wrong-answer2", {"class": "form-control form-control-danger", "id": "wrong-answer2", "placeholder": "Błędna odpowiedź", 'value': question.wrongAnswer2, "required" : true}) }}

                    {% for message in form.getMessagesFor("wrong-answer2") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>
                <div class="form-group has-error">
                    <label for="re-new-password">Błędna odpowiedź</label>
                    {{ form.render("wrong-answer3", {"class": "form-control form-control-danger", "id": "wrong-answer3", "placeholder": "Błędna odpowiedź", 'value': question.wrongAnswer3, "required" : true}) }}

                    {% for message in form.getMessagesFor("wrong-answer3") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group">
                    <label for="password">Kategoria</label>
                    {{ form.render("category", {"class": "form-control", "id": "category", "placeholder": "Kategoria", 'value': question.category, "required" : true}) }}

                    {% for message in form.getMessagesFor("category") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group">
                    <button type="submit" id="edit-question-save" class="btn btn-primary">Zapisz</button>
                </div>
            </form>
            {{ flashSession.output() }}
        </div>
    </div>
{% endblock %}
