<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Aset') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
              role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          <a href="{{ route('items.create') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Tambah Data Aset
          </a>

          <table class="w-full rounded-lg table-auto">
            <thead class="bg-sky-800 text-white">
              <tr>
                <th class="py-2 px-3 rounded-tl-lg">#</th>

                <th class="py-2 px-2">Nama Aset</th>

                <th class="py-2 px-2">Sifat Aset</th>

                <th class="py-2 px-2">Stok</th>

                <th class="py-2 px-2">Kondisi</th>

                <th class="py-2 px-2">Kategori</th>

                <th class="py-2 px-2">Unit Kerja</th>

                <th class="py-2 px-2">Hak Pakai</th>

                <th class="py-2 px-2">Status</th>

                <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
              </tr>
            </thead>

            <tbody class="text-center bg-slate-200">
              @foreach ($items as $item)
                <tr class="border-b border-sky-800">
                  <td class="box-border border-x border-r-sky-800">{{ $loop->iteration }}</td>

                  <td>{{ $item->name }}</td>

                  <td>{{ $item->is_disposable ? 'Habis Pakai' : 'Tidak Habis Pakai' }}</td>

                  <td>{{ $item->stock }}</td>

                  <td>{{ $item->condition }}</td>

                  <td>{{ $item->category->name }}</td>

                  <td>{{ $item->workUnit->name }}</td>

                  <td>{{ $item->usage_permission }}</td>

                  <td>
                    <span
                      class="{{ $item->is_active ? 'bg-green-300' : 'bg-red-300' }} {{ $item->is_active ? 'text-green-900' : 'text-red-900' }} text-md font-extrabold px-3 py-1 rounded">
                      {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                  </td>

                  <td class="py-2 px-3 border-l border-l-sky-800">
                    <ul>
                      <li>
                        <a href="{{ route('items.show', $item->id) }}"
                          class="inline-flex items-center justify-center w-32 py-1.5 bg-cyan-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-500 focus:bg-cyan-500 active:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition ease-in-out duration-150">Tampilkan</a>
                      </li>

                      <li>
                        <a href="{{ route('items.edit', $item->id) }}"
                          class="inline-flex items-center justify-center w-32 my-1.5 py-1.5 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition ease-in-out duration-150">Ubah</a>
                      </li>

                      <li>
                        <form action="{{ route('items.destroy', $item->id) }}" method="post">
                          @csrf
                          @method('DELETE')

                          <button type="submit"
                            class="inline-flex items-center justify-center w-32 py-1.5 {{ $item->is_active ? 'bg-red-600' : 'bg-emerald-600' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:{{ $item->is_active ? 'bg-red-500' : 'bg-emerald-500' }} focus:{{ $item->is_active ? 'bg-red-500' : 'bg-emerald-500' }} active:{{ $item->is_active ? 'bg-red-700' : 'bg-emerald-700' }} focus:outline-none focus:ring-2 focus:{{ $item->is_active ? 'ring-red-500' : 'ring-emerald-500' }} focus:ring-offset-2 transition ease-in-out duration-150">{{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                      </li>
                      </form>
                    </ul>
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
