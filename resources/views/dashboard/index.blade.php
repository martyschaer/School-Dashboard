@extends('app')
@section('content')

<!-- Timetable -->
<!-- TODO: This is just temporary to have something to show -->
<div id="timetable" class="col-md-8">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Time</th>
                <th>Montag</th>
                <th>Dienstag</th>
                <th>Mittwoch</th>
                <th>Donnerstag</th>
                <th>Freitag</th>
            </tr>
        </thead>
        <tbody>
            @for($i=1;$i <=48;$i++)
                <tr>
                @for($j=0;$j < 6;$j++)
                    @if($j==0)
                    <td>{{$i/2}}</td>
                    @else
                    <td>&nbsp;</td>
                    @endif
                @endfor
                </tr>
            @endfor
        </tbody>
    </table>

</div>

<!-- Tasks -->
<div id="tasks" class="col-md-4">

    @foreach($tasks as $task)
    <div class='task col-md-12'>
        <div class="col-md-1">
            <input type="checkbox" name="task{{$task->id}}"
            @if($task->is_done)
                checked
            @endif
            >
        </div>
        <div class="col-md-9">
            <p
            @if($task->is_done)
                class='done'
            @endif
            >
            {{$task->description}}
            </p>
        </div>
        <div class="col-md-1"><i class="fa fa-trash"></i></div>

    </div>
    @endforeach
</div>

<!-- Agenda -->
<!-- TODO: Only temporary like the timetable -->
<br>
<div id="agenda" class="col-md-12">
    <table class="table table-bordered table-hover">
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
    </table>
</div>
@endsection
