<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Kategori Aset') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
              role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          <a href="{{ route('categories.create') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambahkan
            Kategori Baru</a>

          <table class="w-2/4 rounded-lg table-auto">
            <thead class="bg-sky-800 text-white">
              <tr>
                <th class="py-2 px-2 rounded-tl-lg">#</th>

                <th class="py-2 px-2">Nama</th>

                <th class="py-2 px-2">Status</th>

                <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
              </tr>
            </thead>

            <tbody class="text-center bg-slate-200">
              @foreach ($categories as $category)
                <tr class="border-b border-sky-800">
                  <td class="border-r border-r-sky-800">{{ $loop->iteration }}</td>

                  <td>{{ $category->name }}</td>

                  <td>
                    <span
                      class="{{ $category->is_active ? 'bg-green-300' : 'bg-red-300' }} {{ $category->is_active ? 'text-green-900' : 'text-red-900' }} text-md font-extrabold px-3 py-1 rounded">
                      {{ $category->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                  </td>

                  <td class="py-2
                      border-l border-l-sky-800">
                    <ul>
                      <li>
                        <a href="{{ route('categories.edit', $category->id) }}"
                          class="inline-flex items-center justify-center w-32 mb-1.5 py-1.5 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition ease-in-out duration-150">Ubah</a>
                      </li>

                      <li>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button type="submit"
                            class="inline-flex items-center justify-center w-32 py-1.5 {{ $category->is_active ? 'bg-red-600' : 'bg-emerald-600' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:{{ $category->is_active ? 'bg-red-500' : 'bg-emerald-500' }} focus:{{ $category->is_active ? 'bg-red-500' : 'bg-emerald-500' }} active:{{ $category->is_active ? 'bg-red-700' : 'bg-emerald-700' }} focus:outline-none focus:ring-2 focus:{{ $category->is_active ? 'ring-red-500' : 'ring-emerald-500' }} focus:ring-offset-2 transition ease-in-out duration-150">{{ $category->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                        </form>
                      </li>
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
