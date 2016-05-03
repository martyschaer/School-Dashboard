$(".datepicker").datetimepicker({
    minDate: Date.now(),
    format: "YYYY-MM-DD HH:mm:ss",
    sideBySide: true
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
    }).error(function (response) {
        console.error("Error:", response.responseText);
    });
}).on("keydown", ".task-description > p", function (e) {

    // On enter click leave the edit area.
    if (e.which == 13) {
        e.preventDefault();
        $(this).blur();
    }
}).on("blur", ".task-description > p", function () {

    // When the focus blurs we update the description of the task in the database.
    var description = $(this).text();

    $.ajax({
        method: "PUT",
        data: {
            "description": description
        },
        url: baseUrl + "/task/" + $(this).data("taskid") + "/update"
    }).error(function (response) {
        console.error("Error:", response.responseText);
    });
});