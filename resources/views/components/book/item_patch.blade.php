<tr>
  <td class="align-middle">{{ $record->isbn }}</td>
  <td class="align-middle">{{ $record->title }}</td>
  <td class="align-middle">{{ $record->price }}</td>
  <td class="align-middle">{{ $record->publisher }}</td>
  <td class="align-middle">{{ $record->published }}</td>
  <td class="align-middle text-center">
    <form method="GET" action="{{ route('books', ['book' => $record]) }}" class="d-inline">
      <button type="submit" class="btn btn-info align-middle">編集</button>
    </form>
  </td>
  <td class="align-middle text-center">
    <form method="POST" action="{{ action('PolicyController@delete', ['book' => $record]) }}" class="d-inline">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">削除</button>
    </form>
  </td>
</tr>
