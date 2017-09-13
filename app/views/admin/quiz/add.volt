{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <div class="col-md-5">
        <div class="container-fluid">
            <h3>Nowy quiz</h3>

            <form method="post" id="new-quiz">

                <div class="form-group">
                    <label for="password">Nazwa</label>
                    {{ form.render("name", {"class": "form-control", "id": "name", "placeholder": "Nazwa", "autofocus" : true, "required" : true}) }}

                    {% for message in form.getMessagesFor("name") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group">
                    <label for="password">Typ</label>
                    {{ form.render("type", {"class": "form-control", "id": "type", "placeholder": "Typ", "autofocus" : true, "required" : true}) }}

                    {% for message in form.getMessagesFor("type") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group">
                    <label for="password">Kategoria</label>
                    {{ form.render("category", {"class": "form-control", "id": "category", "placeholder": "Kategoria", "autofocus" : true, "required" : true}) }}

                    {% for message in form.getMessagesFor("category") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group">
                    <label for="password">Czas trwania (minuty)</label>
                    {{ form.render("duration", {"class": "form-control", "id": "duration", "autofocus" : true, "required" : true}) }}

                    {% for message in form.getMessagesFor("duration") %}
                        <div class="error aleft">{{ message }}</div>
                    {% endfor %}
                </div>

                <div class="form-group">
                    <button type="submit" id="mew-quiz-next" class="btn btn-primary">Dalej</button>
                </div>


            </form>

        </div>
    </div>
{% endblock %}
