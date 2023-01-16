<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    table {
      margin: auto;
    }

    td {
      text-align: center;
    }

    h1,
    p {
      margin: 0;
    }

    p {
      margin-top: -2px;
    }

    .qr-code {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <table>
    <tr>
      <td>
        <h1>{{ $item->name }}</h1>
      </td>
    </tr>

    <tr>
      <td>
        <p>Tgl Registrasi: {{ $item->created_at->format('d-m-Y') }}</p>
      </td>
    </tr>

    <tr>
      <td>
        <div class="qr-code">
          {!! DNS2D::getBarcodeHTML($item->id, 'QRCODE', 6.5, 6.5) !!}
        </div>
      </td>
    </tr>
  </table>
  <div class="qr-code">
  </div>
</body>

</html>
