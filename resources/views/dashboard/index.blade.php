@extends('app')
@section('content')

    <div class="col-md-6">
        <p>
            <a class="btn btn-primary" href="{{url('/lesson/export/ical')}}">iCal Export</a>
        </p>
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
