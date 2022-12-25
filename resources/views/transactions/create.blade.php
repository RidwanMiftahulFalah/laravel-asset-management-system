<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form action="{{ route('transactions.store') }}" method="post">
    @csrf

    <table>
      <input type="hidden" name="user_id" value="1">
      <input type="hidden" name="item_id" value="{{ $item->id }}">
      <input type="hidden" name="status" value="Pending">
      <input type="hidden" name="checkout_date" value="2022-12-25">
      <tr>
        <td><label for="recipient-name">Nama Penerima : </label></td>
        <td><input type="text" name="recipient_name" id="recipient-name"></td>
      </tr>

      <tr>
        <td><label for="room-id">Ruangan : </label></td>
        <td>
          <select name="room_id" id="room-id">
            @foreach ($rooms as $room)
              <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>

      <tr>
        <td><label for="asset-name">Nama Aset : </label></td>
        <td>
          <div id="asset-name">{{ $item->name }}</div>
        </td>
      </tr>

      <tr>
        <td><label for="quantity">Jumlah : </label></td>
        <td><input type="number" name="quantity" id="quantity" value="{{ !$item->is_disposable ? '1' : '' }}"
            {{ !$item->is_disposable ? 'readonly' : '' }}></td>
      </tr>

      <tr>
        <td></td>
        <td><button type="submit">Checkout</button></td>
      </tr>
    </table>
  </form>
</body>

</html>
