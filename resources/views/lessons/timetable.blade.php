<table border="1px solid black">
    <tr>
        <th>time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
    </tr>
    @foreach($lessons as $lesson)
        <tr>
            <td>{{$lesson}}</td>
        </tr>
    @endforeach
</table>