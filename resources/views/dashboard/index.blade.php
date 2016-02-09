@extends('app')
@section('content')

@foreach($tasks as $task)
<div class='task col-md-12'>
    <div class="col-md-1">
        <input type="checkbox" name="task{{$task->id}}"
        @if($task->is_done)
            checked
        @endif
        >
    </div>
    <div class="col-md-4">
        <p
        @if($task->is_done)
            class='done'
        @endif
        >
        {{$task->description}}
        </p>
    </div>
    <div class="col-md-1">
X
    </div>

</div>


@endforeach

@endsection
