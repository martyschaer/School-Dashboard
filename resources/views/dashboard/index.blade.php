@extends('app')
@section('content')

<div id="timetable" class="col-md-6">
    @include('lessons.timetable')
</div>
<div id="timetable-input">
    @include('lessons.create')
</div>

<!-- Tasks -->
<div id="tasks" class="col-md-6">
    @include('tasks.list')
</div>
@endsection
