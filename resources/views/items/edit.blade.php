<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>Ubah Data Aset</h1>

  <form action="{{ route('items.update', $item->id) }}" method="post">
    @csrf
    @method('PUT')

    {{-- @dd($item->reusable == true) --}}

    <table>
      <tr>
        <td><label for="name">Nama Aset : </label></td>
        <td><input type="text" name="name" id="name" value="{{ $item->name }}"></td>
      </tr>

      <tr>
        <td><label>Habis Pakai</label></td>
        <td>
          <input type="radio" name="disposable" class="disposable" id="ya" value="1"
            {{ $item->disposable ? 'checked' : '' }}>
          <label for="ya">Ya</label>

          <input type="radio" name="disposable" class="disposable" id="tidak" value="0"
            {{ !$item->disposable ? 'checked' : '' }}>
          <label for="tidak">Tidak</label>
        </td>
      </tr>

      <tr>
        <td><label for="stock">Stok : </label></td>
        <td><input type="number" name="stock" id="stock" value="{{ $item->stock }}"></td>
      </tr>

      <tr>
        <td><label for="description">Deskripsi : </label></td>
        <td>
          <textarea name="description" id="description" cols="30" rows="10">{{ $item->description }}</textarea>
        </td>
      </tr>

      <tr>
        <td><label>Status : </label></td>
        <td>
          <input type="radio" name="status" id="layak-pakai" value="Layak Pakai"
            {{ $item->status === 'Layak Pakai' ? 'checked' : '' }}>
          <label for="layak-pakai">Layak Pakai</label>

          <input type="radio" name="status" id="tidak-layak-pakai" value="Tidak Layak Pakai"
            {{ $item->status === 'Tidak Layak Pakai' ? 'checked' : '' }}>
          <label for="tidak-layak-pakai">Tidak Layak Pakai</label>
        </td>
      </tr>

      <tr>
        <td><label for="category">Kategori</label></td>
        <td>
          <select name="category_id" id="category">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $item->category_id === $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>

      <tr>
        <td><label for="work-unit">Unit Kerja</label></td>
        <td>
          <select name="work_unit_id" id="work-unit">
            @foreach ($workUnits as $workUnit)
              <option value="{{ $workUnit->id }}" {{ $item->work_unit_id === $workUnit->id ? 'selected' : '' }}>
                {{ $workUnit->name }}</option>
            @endforeach
          </select>
        </td>
      </tr>

      <tr>
        <td></td>
        <td><button type="submit">Simpan</button></td>
      </tr>
    </table>
  </form>

  <script src="{{ asset('js/items/validation.js') }}"></script>
</body>

</html>
