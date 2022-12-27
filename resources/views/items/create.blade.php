<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tambah Aset Baru') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <form action="{{ route('items.store') }}" method="post">
            @csrf

            <div class="mb-3">
              <label for="name" class="block font-medium text-sm text-gray-700">
                Nama Aset
              </label>
              <input type="text" name="name" id="name"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <div class="mb-3">
              <label class="block font-medium text-sm text-gray-700">
                Habis Pakai
              </label>

              <div class="flex">
                <div class="flex items-center mr-4">
                  <input id="ya" type="radio" value="1" name="is_disposable"
                    class="disposable w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="ya" class="ml-2 text-md font-medium text-gray-900">
                    Ya
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="tidak" type="radio" value="0" name="is_disposable"
                    class="disposable w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="tidak" class="ml-2 text-md font-medium text-gray-900">
                    Tidak
                  </label>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="stock" class="block font-medium text-sm text-gray-700">
                Stok
              </label>
              <input type="number" name="stock" id="stock"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <div class="mb-3">
              <label for="description" class="block font-medium text-sm text-gray-700">
                Deskripsi
              </label>
              <textarea name="description" id="description" cols="30" rows="5"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            </div>

            <div class="mb-3">
              <label for="hak-pakai" class="block font-medium text-sm text-gray-700">
                Hak Pakai
              </label>

              <div class="flex">
                <div class="flex items-center mr-4">
                  <input id="guru" type="radio" value="Guru" name="usage_permission"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="guru" class="ml-2 text-md font-medium text-gray-900">
                    Guru
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="siswa" type="radio" value="Siswa" name="usage_permission"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="siswa" class="ml-2 text-md font-medium text-gray-900">
                    Siswa
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="guru-siswa" type="radio" value="Guru & Siswa" name="usage_permission"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="guru-siswa" class="ml-2 text-md font-medium text-gray-900">
                    Guru & Siswa
                  </label>
                </div>
              </div>
            </div>

            <div id="condition-option" class="mb-3">
              <label class="block font-medium text-sm text-gray-700">
                Kondisi
              </label>

              <div class="flex">
                <div class="flex items-center mr-4">
                  <input id="layak-pakai" type="radio" value="Layak Pakai" name="condition" checked
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="layak-pakai" class="ml-2 text-md font-medium text-gray-900">
                    Layak Pakai
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="rusak" type="radio" value="Rusak" name="condition"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="rusak" class="ml-2 text-md font-medium text-gray-900">
                    Rusak
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="hilang" type="radio" value="Hilang" name="condition"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="hilang" class="ml-2 text-md font-medium text-gray-900">
                    Hilang
                  </label>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="category" class="block font-medium text-sm text-gray-700">
                Kategori
              </label>

              <select name="category_id" id="category"
                class="block w-60 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                @foreach ($categories as $categories)
                  <option value="{{ $categories->id }}">
                    {{ $categories->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="mb-5">
              <label for="work-unit" class="block font-medium text-sm text-gray-700">
                Unit Kerja
              </label>

              <select name="work_unit_id" id="work-unit"
                class="block w-60 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                @foreach ($workUnits as $workUnit)
                  <option value="{{ $workUnit->id }}">
                    {{ $workUnit->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Simpan Data
            </button>
          </form>

          <script src="{{ asset('js/items/validation.js') }}"></script>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
