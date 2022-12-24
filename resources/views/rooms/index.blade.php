<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    table {
      width: 30%;
    }

    td {
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>Rooms Page</h1>

  <a href="{{ route('rooms.create') }}">Tambah Ruangan Baru</a>

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif

  <table>
    <tr>
      <th>ID</th>
      <th>Nama Ruangan</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach ($rooms as $room)
      <tr>
        <td>{{ $room->id }}</td>
        <td>{{ $room->name }}</td>
        <td>{{ $room->is_active ? 'Aktif' : 'Nonaktif' }}</td>
        <td>
          <a href="{{ route('rooms.edit', $room->id) }}">Ubah</a>
          <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">{{ $room->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
</body>

</html>
