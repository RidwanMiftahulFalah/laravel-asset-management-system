<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      text-align: center;
    }

    table {
      margin: auto;
    }

    table,
    th,
    td {
      text-align: center;
      font-size: 15px;
      border: 1px solid black;
      border-collapse: collapse;
    }

    th {
      background-color: rgb(179, 178, 178);
    }

    th,
    td {
      padding: 5px;
    }

    .container {
      width: 100vw;
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <h1>Laporan Transaksi</h1>

  @if (!$requestAllData)
    <p>Tanggal Awal : {{ $startDate ? $startDate : '-' }}</p>
    <p>Tanggal Akhir : {{ $endDate ? $endDate : '-' }}</p>
  @endif

  <table class="w-full table-auto">
    <thead class="bg-sky-800 text-white">
      <tr>
        <th class="py-2 px-2 rounded-tl-lg">#</th>

        <th class="py-2 px-2">Tanggal</th>

        <th class="py-2 px-2">Nama User</th>

        <th class="py-2 px-2">Nama Penerima</th>

        <th class="py-2 px-2 w-3/12">Nama Aset</th>

        <th class="py-2 px-2">Jumlah</th>

        <th class="py-2 px-2">Lokasi Penempatan</th>

        <th class="py-2 px-2 rounded-tr-lg">Status</th>
      </tr>
    </thead>

    <tbody class="text-center bg-slate-200">

      @foreach ($transactions as $transaction)
        <tr class="{{ !$loop->iteration === $transactions->count() ? 'border-b border-sky-800' : '' }}">
          <td
            class="py-3 px-3 border-r border-r-sky-800 {{ $loop->iteration === $transactions->count() ? 'rounded-bl-lg' : '' }}">
            {{ $loop->iteration }}
          </td>

          <td>{{ $transaction->date }}</td>

          <td>{{ $transaction->user->name }}</td>

          <td>{{ $transaction->recipient_name }}</td>

          <td>{{ $transaction->item->name }}</td>

          <td>{{ $transaction->quantity }}</td>

          <td>{{ $transaction->placement_location }}</td>

          <td
            class="py-3 px-2 {{ $loop->iteration === $transactions->count() ? 'rounded-br-lg' : '' }} flex justify-center">
            <div
              class="py-1 w-20 text-sm text-white font-bold rounded-full {{ $transaction->status === 'Pending' ? 'bg-amber-500' : 'bg-emerald-700' }}">
              {{ $transaction->status }}
            </div>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
</body>

</html>
