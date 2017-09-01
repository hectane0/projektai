$(function(){
    $("#new-question-save").click(function () {
        var form = $("#new-question");

        $.ajax({
            url: "/ajax/add-question",
            method: "POST",
            dataType: "json",
            cache: false,
            data: form.serialize(),

            success: function(result){
                if (result.success) {
                    updateLastQuestions();
                    $("#result-success").html("Poprawnie dodano nowe pytanie");
                    $("#question").focus();
                }
                else {
                    fillErrors(result.messages, form);
                }
            }
        });
    });

    $(".select2").select2({
        width: '100%',
        placeholder: "Wybierz" ,
    });

});

// Co tu się robi to ja nawet nie
function fillErrors(messages, form) {
    for (var field in messages) {
        if (messages.hasOwnProperty(field)) {
            form.find("#"+field).siblings(".error").html("").html(messages[field]);
        }
    }
}

function updateLastQuestions() {
    $.ajax({
        url: "/ajax/last-questions",
        method: "POST",
        cache: false,

        success: function(result){
            $("#new-question").find("input[type=text]").html("").val("");
            $("#last-questions").html(result);
        }
    });
}