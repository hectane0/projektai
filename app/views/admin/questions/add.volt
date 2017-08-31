{% extends 'layouts/dashboard.volt' %}

{% block content %}
<div class="col-md-5">
    <div class="container-fluid">
    <h3>Nowe pytanie</h3>

        <form method="post" id="new-question">

            <div class="form-group">
                <label for="password">Pytanie</label>
                {{ form.render("question", {"class": "form-control", "id": "question", "placeholder": "Pytanie", "autofocus" : true, "required" : true}) }}

                <div class="error aleft"></div>
            </div>

            <div class="form-group has-success">
                <label for="new-password">Poprawna odpowiedź</label>
                {{ form.render("right-answer", {"class": "form-control form-control-success", "id": "right-answer", "placeholder": "Poprawna odpowiedź", "required" : true}) }}

                <div class="error aleft"></div>
            </div>

            <div class="form-group has-error">
                <label for="re-new-password">Błędna odpowiedź</label>
                {{ form.render("wrong-answer1", {"class": "form-control form-control-danger", "id": "wrong-answer1", "placeholder": "Błędna odpowiedź", "required" : true}) }}

                <div class="error aleft"></div>
            </div>
            <div class="form-group has-error">
                <label for="re-new-password">Błędna odpowiedź</label>
                {{ form.render("wrong-answer2", {"class": "form-control form-control-danger", "id": "wrong-answer2", "placeholder": "Błędna odpowiedź", "required" : true}) }}

                <div class="error aleft"></div>
            </div>
            <div class="form-group has-error">
                <label for="re-new-password">Błędna odpowiedź</label>
                {{ form.render("wrong-answer3", {"class": "form-control form-control-danger", "id": "wrong-answer3", "placeholder": "Błędna odpowiedź", "required" : true}) }}

                <div class="error aleft"></div>
            </div>

            <div class="form-group">
                <label for="password">Kategoria</label>
                {{ form.render("category", {"class": "form-control", "id": "category", "placeholder": "Kategoria", "required" : true}) }}

                <div class="error aleft"></div>
            </div>

            <div class="form-group">
                <button type="button" id="new-question-save" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
        <div id="result-success"></div>
    </div>

</div>

<div class="col-md-7">
    <div class="container-fluid">
        <h3>Ostatnio dodane pytania:</h3>
        <div id="last-questions">
            {{ partial('ajax/last-questions', ['questions': questions]) }}
        </div>

    </div>

</div>

{% endblock %}
