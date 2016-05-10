<div class="col-md-6">
    {{Form::open(['url' => 'lesson', 'method' => 'POST'])}}
    <input class="form-control" type="text" name="name" placeholder="Name">
    <input class="form-control" type="text" name="details" placeholder="Details">
    <input class="form-control datepicker" type="text" name="time_start" placeholder="Starts at">
    <input class="form-control datepicker" type="text" name="time_end" placeholder="Ends at">
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
    {{Form::close()}}
</div>