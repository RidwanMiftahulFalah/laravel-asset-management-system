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
  <h1>Work Units</h1>
  <a href="{{ route('work_units.create') }}">Tambah Unit Kerja Baru</a>

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif

  <table>
    <tr>
      <th>ID</th>
      <th>Nama Unit Kerja</th>
      <th>Operasi</th>
    </tr>

    @foreach ($workUnits as $workUnit)
      <tr>
        <td>{{ $workUnit->id }}</td>
        <td>{{ $workUnit->name }}</td>
        <td>
          <a href="{{ route('work_units.edit', $workUnit->id) }}">Ubah</a>
          <form action="{{ route('work_units.destroy', $workUnit->id) }}" method="post">
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
