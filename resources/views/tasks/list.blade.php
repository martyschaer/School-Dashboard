<div class="vertical-margin col-md-12">
    <p>
        <a class="btn btn-primary pull-right" href="{{url('/task/export/ical')}}">iCal Export</a>
    </p>
</div>
@foreach($tasks as $task)
    <div class='task col-md-12'>
        <div class="col-md-1">
            <input title="check" class="task-check" data-taskid="{{$task->id}}" type="checkbox" name="task{{$task->id}}"
                   @if($task->is_done)
                   checked
                    @endif
            >
        </div>
        <div class="task-description col-md-7">
            <p data-taskid="{{$task->id}}" contenteditable="true"
               @if($task->is_done)
               class='done'
               @endif
            >{{$task->description}}</p>
        </div>
        <div class="col-md-3">
             <span class="pull-right label label-danger"><i class="fa fa-clock-o"></i>
                 @if(isset($task->due_at))
                     {{$task->due_at->format('Y-m-d H:i')}}
                 @else
                     Nope
                 @endif
            </span>
        </div>
        <div class="col-md-1"><i data-taskid="{{$task->id}}" class="task-delete fa fa-trash"></i></div>

    </div>
@endforeach
<div class="col-md-12">
    {{ Form::open(['url' => 'task', 'method' => 'POST', 'class' => 'form-inline']) }}
    <div class="form-group">
        <div class="input-group">
            <input class="form-control" type="text" name="description" placeholder="New Task">

            <span class="input-group-btn">
                <input class="form-control datepicker" type="text" name="due_at" placeholder="Due at">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
            </span>

        </div>

    </div>


</div>

{{ Form::close() }}
