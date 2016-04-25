@extends('app')
@section('content')

        <!-- Timetable -->
<!-- TODO: This is just temporary to have something to show -->
<div id="timetable" class="col-md-6">
    nothing here...
</div>

<!-- Tasks -->
<div id="tasks" class="col-md-6">
    @include('tasks.list')
</div>

<!-- Agenda -->
<!-- TODO: Only temporary like the timetable -->
<br>
<div id="agenda" class="col-md-12">
    <!--<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>
                Date:
                </th>
                <th>
                Task:
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tomorrow</td>
                <td>Go to work</td>
            </tr>
        </tbody>
    </table>-->
</div>
@endsection
