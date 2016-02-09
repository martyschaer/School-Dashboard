@extends('app')
@section('content')

<div class="calendar col-md-8">
    @for($i = 1; $i<=5;$i++)
        <div class="cell col-md-2">
        <br>
        {{$i}}
        <br>
        </div>
    @endfor
    @for($i = 1; $i<=5;$i++)
        <div class="cell col-md-2">
        <br>
        {{$i}}
        <br>
        </div>
    @endfor
    @for($i = 1; $i<=5;$i++)
        <div class="cell col-md-2">
        <br>
        {{$i}}
        <br>
        </div>
    @endfor

</div>
<div class="tasks col-md-4">

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
@endsection
