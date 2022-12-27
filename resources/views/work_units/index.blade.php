<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Unit Kerja') }}
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

          <a href="{{ route('work_units.create') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambahkan
            Unit Kerja Baru</a>

          <div class="max-w-screen">
            <table class="w-2/4 rounded-lg table-auto">
              <thead class="bg-sky-800 text-white">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Nama Unit Kerja</th>

                  <th class="py-2 px-2">Status</th>

                  <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($workUnits->count())
                  @foreach ($workUnits as $workUnit)
                    <tr class="border-b border-sky-800">
                      <td class="border-r border-r-sky-800">{{ $loop->iteration }}</td>

                      <td>{{ $workUnit->name }}</td>

                      <td>
                        <span
                          class="{{ $workUnit->is_active ? 'bg-green-300' : 'bg-red-300' }} {{ $workUnit->is_active ? 'text-green-900' : 'text-red-900' }} text-md font-extrabold px-3 py-1 rounded">
                          {{ $workUnit->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                      </td>

                      <td class="py-2 border-l border-l-sky-800">
                        <ul>
                          <li>
                            <a href="{{ route('work_units.edit', $workUnit->id) }}"
                              class="inline-flex items-center justify-center w-32 mb-1.5 py-1.5 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition ease-in-out duration-150">Ubah</a>
                          </li>

                          <li>
                            <form action="{{ route('work_units.destroy', $workUnit->id) }}" method="post">
                              @csrf
                              @method('DELETE')

                              <button type="submit"
                                class="inline-flex items-center justify-center w-32 py-1.5 {{ $workUnit->is_active ? 'bg-red-600' : 'bg-emerald-600' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:{{ $workUnit->is_active ? 'bg-red-500' : 'bg-emerald-500' }} focus:{{ $workUnit->is_active ? 'bg-red-500' : 'bg-emerald-500' }} active:{{ $workUnit->is_active ? 'bg-red-700' : 'bg-emerald-700' }} focus:outline-none focus:ring-2 focus:{{ $workUnit->is_active ? 'ring-red-500' : 'ring-emerald-500' }} focus:ring-offset-2 transition ease-in-out duration-150"">{{ $workUnit->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                            </form>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="4">Data tidak ditemukan.</td>
                @endif

              </tbody>
            </table>
          </div>

          {{ $workUnits->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
