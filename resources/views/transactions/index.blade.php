<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaksi') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div class="message">
              {{ session('message') }}
            </div>
          @endif

          <table class="w-full table-auto">
            <thead class="bg-sky-800 text-white">
              <tr>
                <th class="py-2 px-2 rounded-tl-lg">Nama Aset</th>
                <th class="py-2 px-2">Stok</th>
                <th class="py-2 px-2">Kondisi Aset</th>
                <th class="py-2 px-2">Hak Pakai</th>
                <th class="py-2 px-2">Kategori</th>
                <th class="py-2 px-2">Sifat Aset</th>
                <th class="py-2 px-2">Status</th>
                <th class="py-2 px-2 rounded-tr-lg">Operasi</th>
              </tr>
            </thead>

            <tbody class="text-center bg-slate-200">
              @foreach ($items as $item)
                <tr class="border-b border-sky-800">
                  <td class="py-3 px-2">{{ $item->name }}</td>
                  <td class="py-3 px-2">{{ $item->stock }}</td>
                  <td class="py-3 px-2">{{ $item->condition }}</td>
                  <td class="py-3 px-2">{{ $item->usage_permission }}</td>
                  <td class="py-3 px-2">{{ $item->category->name }}</td>
                  <td class="py-3 px-2">{{ $item->is_disposable ? 'Habis Pakai' : 'Tidak Habis Pakai' }}</td>
                  <td class="py-3 px-2">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                  <td class="py-3 px-2">
                    <a href="{{ route('transactions.create', ['id' => $item->id]) }}"
                      class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Pilih</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
