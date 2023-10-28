$("document").ready(function () {
    $(".multiple-select").select2({
        placeholder: "Select an option",
    });

    $("body").on("click", ".btn-close-sidebar", function () {
        $("body").removeClass("toggle-sidebar");
    });
});