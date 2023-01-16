<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Detail Data Aset') }}
      </h2>

      <a href="{{ route('items.index') }}"
        class="inline-flex items-center px-4 py-2 bg-teal-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        Kembali
      </a>
    </div>

  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <div class="mb-3">
            <label class="block font-medium text-sm text-gray-700">
              QR Code
            </label>
            <div class="mb-3">
              {!! DNS2D::getBarcodeHTML($item->id, 'QRCODE', 6.5, 6.5) !!}
            </div>
            <div class="mb-3">
              <a href="{{ route('items.QRCodePDF', ['id' => $item->id]) }}"
                class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Unduh QR Code Aset
              </a>
            </div>
          </div>

          <div class="mb-3">
            <label for="name" class="block font-medium text-sm text-gray-700">
              Nama Aset
            </label>

            <input type="text" id="name" value="{{ $item->name }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-3">
            <label for="name" class="block font-medium text-sm text-gray-700">
              Tanggal Registrasi
            </label>

            <input type="text" id="name" value="{{ $item->created_at->format('d-m-Y') }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-3">
            <label class="block font-medium text-sm text-gray-700">
              Jenis Aset
            </label>

            <input type="text" id="name"
              value="{{ $item->is_disposable ? 'Habis Pakai' : 'Tidak Habis Pakai' }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-3">
            <label for="stock" class="block font-medium text-sm text-gray-700">
              Stok
            </label>

            <input type="number" id="stock" value="{{ $item->stock }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div id="condition-option" class="mb-3">
            <label class="block font-medium text-sm text-gray-700">
              Kondisi
            </label>

            <input type="text" id="name" value="{{ $item->condition }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-3">
            <label for="category" class="block font-medium text-sm text-gray-700">
              Kategori
            </label>

            <input type="text" id="name" value="{{ $item->category->name }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-5">
            <label for="work-unit" class="block font-medium text-sm text-gray-700">
              Unit Kerja
            </label>

            <input type="text" id="name" value="{{ $item->workUnit->name }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-3">
            <label for="hak-pakai" class="block font-medium text-sm text-gray-700">
              Hak Pakai
            </label>

            <input type="text" id="name" value="{{ $item->usage_permission }}" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
          </div>

          <div class="mb-3">
            <label for="description" class="block font-medium text-sm text-gray-700">
              Deskripsi
            </label>

            <textarea id="description" cols="30" rows="5" readonly
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $item->description }}</textarea>
          </div>

          <script src="{{ asset('js/items/validation.js') }}"></script>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
