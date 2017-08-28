{% extends 'layouts/profile.volt' %}

{% block content %}
    <div class="col-md-5">
    <h3>Zmiana hasła</h3>

    <form method="post">

        <div class="form-group">
            <label for="password">Hasło</label>
            {{ form.render("password", {"class": "form-control", "id": "password", "placeholder": "Hasło", "autofocus" : true, "required" : true}) }}

            {% for message in form.getMessagesFor("password") %}
                <div class="error aleft">{{ message }}</div>
            {% endfor %}
        </div>

        <div class="form-group">
            <label for="new-password">Nowe hasło</label>
            {{ form.render("new-password", {"class": "form-control", "id": "new-password", "placeholder": "Nowe hasło", "required" : true}) }}

            {% for message in form.getMessagesFor("new-password") %}
                <div class="error aleft">{{ message }}</div>
            {% endfor %}
        </div>

        <div class="form-group">
            <label for="re-new-password">Potwierdź nowe hasło</label>
            {{ form.render("re-new-password", {"class": "form-control", "id": "re-new-password", "placeholder": "Potwiedź nowe hasło", "required" : true}) }}

            {% for message in form.getMessagesFor("re-new-password") %}
                <div class="error aleft">{{ message }}</div>
            {% endfor %}
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>

    </form>

        {{ flashSession.output() }}

    </div>




{% endblock %}
