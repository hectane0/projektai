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

                }
                else {
                    fillErrors(result.messages, form);
                }
            }
        });
    })
});

// Co tu się robi to ja nawet nie
function fillErrors(messages, form) {
    for (var field in messages) {
        if (messages.hasOwnProperty(field)) {
            form.find("#"+field).siblings(".error").html("").html(messages[field]);
        }
    }
}