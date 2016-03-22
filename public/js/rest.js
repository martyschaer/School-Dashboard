$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var baseUrl = $('meta[name="base-url"]').attr('content');

//<a data-taskid="3">Delete</a>
$(".task-delete").click(function() {
    $.ajax({
        method: "DELETE",
        url: baseUrl + "/task/" + $(this).data('taskid') + "/delete"
    })
        .done(function(msg) {
            console.log(msg);
           console.log("Good job deleting...");
        })
        .error(function(msg) {
            console.log("Error:", msg.responseText);
            $("body").html(msg.responseText);
        })
});
/*
$.ajax({
        method: "POST",
        url: "",
        data: {
            name: "John",
            location: "Boston"
        }
    })
    .done(function (msg) {
        alert("Data Saved: " + msg);
    });
*/