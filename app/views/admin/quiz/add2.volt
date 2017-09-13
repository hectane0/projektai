{% extends 'layouts/dashboard.volt' %}

{% block content %}
        <div class="container-fluid">
            <h3>Dodaj pytania</h3>

            <form method="post">

                <select title="Pytania do quizu" name="questions[]" class="select2" multiple>
                    {% for question in questions %}
                        <option value="{{ question.id }}">{{ question.question|escape }}</option>
                    {% endfor %}
                </select>

                <div class="form-group" style="margin-top: 10px">
                    <button type="submit" id="mew-quiz-next" class="btn btn-primary">Dalej</button>
                </div>

            </form>
        </div>
{% endblock %}
