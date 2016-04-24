$(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    autoclose: true
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
    }
});
var baseUrl = $("meta[name='base-url']").attr("content");

//<a data-taskid="3">Delete</a>
$("#tasks").on("click", ".task-delete", function () {
    if (!confirm("Do you really want to delete this task?")) {
        return true;
    }
    $.ajax({
        method: "DELETE",
        url: baseUrl + "/task/" + $(this).data("taskid") + "/delete"
    }).done(function (response) {
        $("#tasks").html(response);
    }).error(function (response) {
        console.error("Error:", response.responseText);
    });
}).on("change", ".task-check", function () {
    $(this).parent().siblings(".task-description").children("p").toggleClass("done");
    $.ajax({
        method: "PATCH",
        url: baseUrl + "/task/" + $(this).data("taskid") + "/check"
    }).done(function () {
        // Success!
    }).error(function (response) {
        console.error("Error:", response.responseText);
    });
});