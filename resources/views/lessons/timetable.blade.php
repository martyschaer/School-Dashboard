<table class="table table-striped">
    <tr>
        <th>time</th>
        @foreach($weekdays as $weekday)
            <th>{{$weekday}}</th>
        @endforeach
    </tr>
    @for($hour = 1; $hour <= 24; $hour++)
        <tr>
            <?php $putLesson = false; ?>
            <td>{{sprintf('%02d:00', $hour)}}</td>
            @foreach($weekdays as $weekday)
                @foreach($lessons as $lesson)
                    @if(date('l', strtotime($lesson->time_start)) == $weekday && date('G', strtotime($lesson->time_start)) == $hour)
                        <td class="lesson" title="{{$lesson->details}}"
                            rowspan="{{date('G', strtotime($lesson->time_end)) - date('G', strtotime($lesson->time_start))}}">{{$lesson->name}}</td>
                        <?php $putLesson = true; ?>
                    @endif
                @endforeach
                @if(!$putLesson)
                    <td></td>
                    <?php $putLesson = false; ?>
                @endif
            @endforeach
        </tr>
    @endfor
</table>