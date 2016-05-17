/**
 * This file is all of the needed javascript code for the application.
 *
 * @author Severin Kaderli
 */

/**
 * Initialise the datetimepicker
 */
$(".datepicker").datetimepicker({
    minDate: Date.now(),
    format: "YYYY-MM-DD HH:mm",
    sideBySide: true,
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: "fa fa-chevron-left",
        next: "fa fa-chevron-right",
        today: "fa fa-calendar-check-o",
        clear: "fa fa-trash-o",
        close: "fa fa-close"
    }
});

/**
 * Sent the CSRF-Token in every AJAX request to prevent CSRF issues.
 */
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
    }
});
var baseUrl = $("meta[name='base-url']").attr("content");

/**
 * All logic that is done using AJAX.
 */
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