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
          <input type="radio" name="is_disposable" class="disposable" id="ya" value="1"
            {{ $item->is_disposable ? 'checked' : '' }}>
          <label for="ya">Ya</label>

          <input type="radio" name="is_disposable" class="disposable" id="tidak" value="0"
            {{ !$item->is_disposable ? 'checked' : '' }}>
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
        <td><label for="hak-pakai">Hak Pakai : </label></td>
        <td>
          <input type="radio" name="usage_permission" id="guru" value="Guru"
            {{ $item->usage_permission === 'Guru' ? 'checked' : '' }}>
          <label for="guru">Guru</label>

          <input type="radio" name="usage_permission" id="siswa" value="Siswa"
            {{ $item->usage_permission === 'Siswa' ? 'checked' : '' }}>
          <label for="siswa">Siswa</label>

          <input type="radio" name="usage_permission" id="guru-siswa" value="Guru & Siswa"
            {{ $item->usage_permission === 'Guru & Siswa' ? 'checked' : '' }}>
          <label for="guru-siswa">Guru & Siswa</label>
        </td>
      </tr>

      <tr id="condition-option">
        <td><label>Kondisi : </label></td>
        <td>
          <input type="radio" name="condition" id="layak-pakai" value="Layak Pakai"
            {{ $item->condition === 'Layak Pakai' ? 'checked' : '' }}>
          <label for="layak-pakai">Layak Pakai</label>

          <input type="radio" name="condition" id="rusak" value="Rusak"
            {{ $item->condition === 'Rusak' ? 'checked' : '' }}>
          <label for="rusak">Rusak</label>

          <input type="radio" name="condition" id="hilang" value="Hilang"
            {{ $item->condition === 'Hilang' ? 'checked' : '' }}>
          <label for="hilang">Hilang</label>
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
