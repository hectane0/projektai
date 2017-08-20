$(document).ready(function () {

    $("i.spinner").hide();

    $(".spin").on("click", function () {
        $(this).find("i.spinner").show().addClass("fa-spin");
    })
})