@extends('app')
@section('content')

<div class="col-md-6">
    <div id="timetable">
        @include('lessons.timetable')
    </div>
    <hr>
    <div id="timetable-input">
        @include('lessons.create')
    </div>
</div>

<!-- Tasks -->
<div id="tasks" class="col-md-6">
    @include('tasks.list')
</div>
@endsection
