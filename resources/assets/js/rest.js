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
$(".task-delete").click(function () {
    $.ajax({
        method: "DELETE",
        url: baseUrl + "/task/" + $(this).data("taskid") + "/delete"
    })
    .done(function () {
        //Refresh ui here
    })
    .error(function (msg) {
        console.error("Error:", msg.responseText);
    });
});