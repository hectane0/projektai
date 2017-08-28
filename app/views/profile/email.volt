{% extends 'layouts/profile.volt' %}

{% block content %}
    <div class="col-md-5">
        <h3>Zmiana e-maila</h3>

        <form method="post">

            <div class="form-group">
                <label for="password">Nowy email</label>
                {{ form.render("email", {"class": "form-control", "id": "email", "placeholder": "Nowy email", "autofocus" : true, "required" : true}) }}

                {% for message in form.getMessagesFor("email") %}
                    <div class="error aleft">{{ message }}</div>
                {% endfor %}
            </div>

            <div class="form-group">
                <label for="new-password">Potwierdź nowy email</label>
                {{ form.render("re-email", {"class": "form-control", "id": "re-email", "placeholder": "Potwierdź nowy email", "required" : true}) }}

                {% for message in form.getMessagesFor("re-email") %}
                    <div class="error aleft">{{ message }}</div>
                {% endfor %}
            </div>

            <div class="form-group">
                <label for="re-new-password">Hasło</label>
                {{ form.render("password", {"class": "form-control", "id": "password", "placeholder": "Hasło", "required" : true}) }}

                {% for message in form.getMessagesFor("password") %}
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
