<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar User') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
              role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          <div class="mb-3 w-1/2">
            <form action="{{ route('users.index') }}" method="get">
              @csrf

              <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" id="default-search"
                  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Cari Nama Pengguna">
                <button type="submit"
                  class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
              </div>
            </form>
          </div>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Nama Pengguna</th>

                  <th class="py-2 px-2">Email</th>

                  <th class="py-2 px-2">Telepon</th>

                  <th class="py-2 px-2">Peran</th>

                  <th class="py-2 px-2">Status</th>

                  <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($users->count())
                  @foreach ($users as $user)
                    <tr class="{{ $loop->iteration != $users->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $users->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}
                      </td>

                      <td>{{ $user->name }}</td>

                      <td>{{ $user->email }}</td>

                      <td>{{ $user->phone }}</td>

                      <td>{{ $user->is_admin ? 'Super Admin' : 'Admin' }}</td>

                      <td>
                        <span
                          class="{{ $user->is_active ? 'bg-green-300' : 'bg-red-300' }} {{ $user->is_active ? 'text-green-900' : 'text-red-900' }} text-md font-extrabold px-3 py-1 rounded">
                          {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                      </td>

                      <td
                        class="py-5 border-l border-l-sky-800 {{ $loop->iteration === $users->count() ? 'rounded-br-lg' : '' }}">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                          @csrf
                          @method('PUT')

                          <button type="submit"
                            class="inline-flex items-center justify-center w-32 py-1.5 {{ $user->is_active ? 'bg-red-600' : 'bg-emerald-600' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:{{ $user->is_active ? 'bg-red-500' : 'bg-emerald-500' }} focus:{{ $user->is_active ? 'bg-red-500' : 'bg-emerald-500' }} active:{{ $user->is_active ? 'bg-red-700' : 'bg-emerald-700' }} focus:outline-none focus:ring-2 focus:{{ $user->is_active ? 'ring-red-500' : 'ring-emerald-500' }} focus:ring-offset-2 transition ease-in-out duration-150"">{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="7">Data tidak ditemukan.</td>
                @endif
              </tbody>
            </table>
          </div>


          {{ $users->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
