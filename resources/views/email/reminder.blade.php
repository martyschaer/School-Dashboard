<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reminder</title>
</head>
<body>
<h1>Hello {{$user->email}}</h1>
<p>
    We are reminding you of your task: "{{$task->description}}". The task is due at
    "{{$task->due_at->format("Y-m-d H:i:s")}}"
</p>
<p>- School-Dashboard</p>
</body>
</html>