$(document).ready(function () {

    $("i.spinner").hide();

    $(".spin").on("click", function () {
        $(this).find("i.spinner").show().addClass("fa-spin");
    })

    $(document).ready(function () {
        $(".datatables").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Polish.json"
            }
        });
    });

});