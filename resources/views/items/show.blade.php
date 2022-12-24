<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <table>
    <tr>
      <td><label for="name">Nama Aset : </label></td>
      <td>
        <p id="name">{{ $item->name }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="is_disposable">Sifat Aset : </label></td>
      <td>
        <p id="is_disposable">{{ $item->is_disposable ? 'Habis Pakai' : 'Tidak Habis Pakai' }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="stock">Stok : </label></td>
      <td>
        <p id="stock">{{ $item->stock }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="description">Deskripsi : </label></td>
      <td>
        <p id="description">{{ $item->description }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="usage-permission">Hak Pakai : </label></td>
      <td>
        <p id="usage-permission">{{ $item->usage_permission }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="condition"></label></td>
      <td>
        <p id="condition">{{ $item->condition }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="is_active">Status : </label></td>
      <td>
        <p id="is_active">{{ $item->is_active }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="category">Kategori</label></td>
      <td>
        <p id="category">{{ $item->category->name }}</p>
      </td>
    </tr>

    <tr>
      <td><label for="work-unit">Unit Kerja</label></td>
      <td>
        <p id="work-unit">{{ $item->workUnit->name }}</p>
      </td>
    </tr>
  </table>
</body>

</html>
