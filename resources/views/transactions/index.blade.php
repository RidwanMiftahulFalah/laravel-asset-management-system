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
  <h1>Halaman Transaksi</h1>

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif

  <table>
    <tr>
      <th>Nama Aset</th>
      <th>Stok</th>
      <th>Kondisi Aset</th>
      <th>Hak Pakai</th>
      <th>Kategori</th>
      <th>Sifat Aset</th>
      <th>Operasi</th>
    </tr>

    @foreach ($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->stock }}</td>
        <td>{{ $item->condition }}</td>
        <td>{{ $item->usage_permission }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->is_disposable ? 'Habis Pakai' : 'Tidak Habis Pakai' }}</td>
        <td>
          <a href="{{ route('transactions.create', $item->id) }}">Pilih</a>
        </td>
      </tr>
    @endforeach
  </table>
</body>

</html>
