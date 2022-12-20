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
      width: 70%;
    }

    td {
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>Data Aset</h1>
  <a href="{{ route('items.create') }}">Tambah Data Aset</a>

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif

  <table>
    <tr>
      <th>ID</th>
      <th>Nama Aset</th>
      <th>Stok</th>
      <th>Status</th>
      <th>Kategori</th>
      <th>Unit Kerja</th>
      <th>Operasi</th>
    </tr>

    @foreach ($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->stock }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->workUnit->name }}</td>
        <td>
          <a href="{{ route('items.show', $item->id) }}">Tampilkan</a>
          <a href="{{ route('items.edit', $item->id) }}">Ubah</a>
          <form action="{{ route('items.destroy', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            
            <button type="submit">Hapus</button>
          </form>                  
        </td>
      </tr>
    @endforeach
  </table>
</body>

</html>
