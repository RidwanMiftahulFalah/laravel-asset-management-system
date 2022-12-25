<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form
    action="{{ route('transactions.update', ['transaction' => $transaction->id, 'item_id' => $transaction->item_id]) }}"
    method="post">
    @csrf
    @method('PUT')

    <table>
      <tr>
        <td><label for="checkout-date">Tanggal Transaksi : </label></td>
        <td>
          <div id="checkout-date">{{ $transaction->checkout_date }}</div>
        </td>
      </tr>

      <tr>
        <td><label for="recipient-name">Nama Penerima : </label></td>
        <td>
          <div id="recipient-name">{{ $transaction->recipient_name }}</div>
        </td>
      </tr>

      <tr>
        <td><label for="room-name">Ruang Penempatan Aset : </label></td>
        <td>
          <div id="room-name">{{ $transaction->room->name }}</div>
        </td>
      </tr>

      <tr>
        <td><label for="item-name">Nama Aset : </label></td>
        <td>
          <div id="item-name">{{ $transaction->item->name }}</div>
        </td>
      </tr>

      <tr>
        <td><label for="quantity">Jumlah : </label></td>
        <td>
          <div id="quantity">{{ $transaction->quantity }}</div>
        </td>
      </tr>

      <tr>
        <td><label>Kondisi Aset : </label></td>
        <td>
          <input type="radio" name="condition" id="layak-pakai" value="Layak Pakai"
            {{ $transaction->item->condition === 'Layak Pakai' ? 'checked' : '' }}>
          <label for="layak-pakai">Layak Pakai</label>

          <input type="radio" name="condition" id="rusak" value="Rusak"
            {{ $transaction->item->condition === 'Rusak' ? 'checked' : '' }}>
          <label for="rusak">Rusak</label>

          <input type="radio" name="condition" id="hilang" value="Hilang"
            {{ $transaction->item->condition === 'Hilang' ? 'checked' : '' }}>
          <label for="hilang">Hilang</label>
        </td>
      </tr>

      <tr>
        <td></td>
        <td><button type="submit">Selesaikan Transaksi</button></td>
      </tr>
    </table>
  </form>
</body>

</html>
