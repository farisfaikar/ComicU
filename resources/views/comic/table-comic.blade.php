<table>
<thead>
    <tr>
        <th>no</th>
        <th>comic name</th>
        <th>price</th>
        <th>synopsis</th>
        <th>author</th>
        <th >stock</th>
        <th >category</th>
    </tr>
</thead>
<tbody>
   @foreach ($comics as $comic)
        <tr >
            <td > {{$loop->iteration}} </td>
            <td > {{ $comic->comic_name }} </td>
            <td > Rp. {{ $comic->price }} </td>
            <td> {{  $comic->synopsis }} </td>
            <td > {{ $comic->author }} </td>
            <td > {{ $comic->stock }}</td>
            <td >
                {{$comic->category->category_name }}
            </td>
        </tr>
        @endforeach
</tbody>
</table>