@foreach($tasks as $task)
    <div class='task col-md-12'>
        <div class="col-md-1">
            <input class="task-check" data-taskid="{{$task->id}}" type="checkbox" name="task{{$task->id}}"
                   @if($task->is_done)
                   checked
                    @endif
            >
        </div>
        <div class="task-description col-md-9">
            <p
                    @if($task->is_done)
                    class='done'
                    @endif
            >
                {{$task->description}}
            </p>
        </div>
        <div class="col-md-1"><i data-taskid="{{$task->id}}" class="task-delete fa fa-trash"></i></div>

    </div>
@endforeach
<div class="col-md-12">
    {{ Form::open(['url' => 'task', 'method' => 'POST', 'class' => 'form-inline']) }}
    <div class="form-group">
        <div class="input-group">
            <input class="form-control" type="text" name="description" placeholder="New Task">

        </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>

    <div class="form-group">
        <div class="input-group">
            <input class="form-control datepicker" name="remind_at" placeholder="Reminder">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <div class="input-group">
            <input class="form-control datepicker" name="due_at" placeholder="Due at">
        </div>
    </div>
</div>

{{ Form::close() }}
