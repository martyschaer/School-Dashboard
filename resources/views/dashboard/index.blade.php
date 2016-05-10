@extends('app')
@section('content')

        <!-- Timetable -->
<!-- TODO: This is just temporary to have something to show -->
<div id="lessons" class="col-md-6">
    @include('lessons.timetable')
</div>

<!-- Tasks -->
<div id="tasks" class="col-md-6">
    @include('tasks.list')
</div>
@endsection
