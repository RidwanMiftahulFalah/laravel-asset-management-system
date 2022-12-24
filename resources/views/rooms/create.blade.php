<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form action="{{ route('rooms.store') }}" method="POST">
    @csrf
    <input type="text" name="name" id="name">

    <input type="hidden" name="is_active" value="1">

    <button type="submit">Simpan</button>
  </form>
</body>

</html>
