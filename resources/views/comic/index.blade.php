<x-app-layout>
    <div class="overflow-x-auto">
        <a href="{{ route('comic.create') }}" class="btn btn-primary">add</a>
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
                <th>id</th>
                <th>nama comic</th>
                <th>sinopsis</th>
                <th>author</th>
                <th>stok</th>
                <th>category</th>
                <th>action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                @php
                    $no = 1;
                @endphp
                @foreach ($comics as $comic)
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $comic->comic_name }} </td>
                <td> {{ $comic->synopsis }}</td>
                <td> {{ $comic->author }} </td>
                <td> {{ $comic->stock }}</td>
                <td> {{ $comic->category_id}}</td>
                <td class="flex ">
                    <form action="{{ route('comic.edit', $comic->id)}}" method="get" >
                        @csrf
                        <button class="btn btn-secondary btn-sm" type="submit">edit</button>
                    </form>
                    {{-- <button><a href="{{ route('edit', $comic->id) }}">edit</a></button> --}}
                    <form action="{{ route('comic.destroy', $comic->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-error btn-sm " onclick="return confirm ('are you sure')">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tr>
          </tbody>
        </table>
      </div>

</x-app-layout>


