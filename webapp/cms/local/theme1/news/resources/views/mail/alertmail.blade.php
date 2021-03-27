<h3>Mail Alert for {{Date('d-m-Y')}}</h3>
<table>
    <thead>
        <tr>
            <th>
                Source
            </th>
            <th>
                News Count
            </th>
        </tr>
    </thead>
    <tbody>
@foreach($data as $d)
<tr>
    <td>{{$d->source}}</td>
    <td>{{$d->total}}</td>
</tr>
@endforeach
</tbody>
</table>