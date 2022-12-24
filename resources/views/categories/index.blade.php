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
  <h1>Category Page</h1>

  <a href="{{ route('categories.create') }}">Tambah Kategori Baru</a>

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif

  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach ($categories as $category)
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->is_active ? 'Aktif' : 'Nonaktif' }}</td>
        <td>
          <a href="{{ route('categories.edit', $category->id) }}">Ubah</a>
          <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">{{ $category->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
</body>

</html>
