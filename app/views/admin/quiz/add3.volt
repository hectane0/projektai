{% extends 'layouts/dashboard.volt' %}

{% block content %}
    <div class="container-fluid">
        <h3>Dodaj uczestników</h3>

        <form method="post">

            <select title="Pytania do quizu" name="users[]" class="select2" multiple>
                {% for user in users %}
                    <option value="{{ user.id }}">{{ user.firstName }} {{ user.lastName }}</option>
                {% endfor %}
            </select>

            <div class="form-group" style="margin-top: 10px">
                <button type="submit" id="mew-quiz-next" class="btn btn-primary">Dalej</button>
            </div>

        </form>
    </div>
{% endblock %}
