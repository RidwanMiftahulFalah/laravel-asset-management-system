<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
  }

  table {
    width: 90%;
  }

  td {
    text-align: center;
  }
</style>

<body>
  <table>
    <tr>
      <td>Tanggal Transaksi</td>
      <th>Nama Penerima</th>
      <th>Nama Aset</th>
      <th>Jumlah</th>
      <th>Ruangan Penempatan</th>
      <th>Status</th>
      <th>Operasi</th>
    </tr>

    @foreach ($transactions as $transaction)
      <tr>
        <td>{{ $transaction->checkout_date }}</td>
        <td>{{ $transaction->recipient_name }}</td>
        <td>{{ $transaction->item->name }}</td>
        <td>{{ $transaction->quantity }}</td>
        <td>{{ $transaction->room->name }}</td>
        <td>{{ $transaction->status }}</td>
        @if ($transaction->status == 'Pending')
          <td><a href="{{ route('transactions.edit', $transaction->item_id) }}">Selesaikan Transaksi</a></td>
        @endif
      </tr>
    @endforeach
  </table>
</body>

</html>
