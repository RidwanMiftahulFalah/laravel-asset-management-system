<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Aset') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          <a href="{{ route('items.create') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Tambah Data Aset
          </a>

          <div class="mb-3 w-1/2">
            <form action="{{ route('items.index') }}" method="get">
              @csrf

              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" id="default-search"
                  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Cari Nama Aset">
                <button type="submit"
                  class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
              </div>
            </form>
          </div>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white">
                <tr>
                  <th class="py-2 px-3 rounded-tl-lg">#</th>

                  <th class="py-2 px-2 w-60">Nama Aset</th>

                  <th class="py-2 px-2 w-32">Sifat Aset</th>

                  <th class="py-2 px-2">Stok</th>

                  <th class="py-2 px-2">Kondisi</th>

                  <th class="py-2 px-2">Kategori</th>

                  <th class="py-2 px-2 w-32">Unit Kerja</th>

                  <th class="py-2 px-2">Hak Pakai</th>

                  <th class="py-2 px-4">Status</th>

                  <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($items->count())
                  @foreach ($items as $item)
                    <tr class="{{ $loop->iteration != $items->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $items->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}
                      </td>

                      <td class="break-all">{{ $item->name }}</td>

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

                      <td
                        class="py-2 px-3 border-l border-l-sky-800 {{ $loop->iteration === $items->count() ? 'rounded-br-lg' : '' }}">
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
                @else
                  <td colspan="10">Data tidak ditemukan.</td>
                @endif
              </tbody>
            </table>
          </div>

          {{ $items->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
