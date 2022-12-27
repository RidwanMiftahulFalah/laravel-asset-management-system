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
                @foreach ($users as $user)
                  <tr class="border-b border-sky-800">
                    <td class="border-r border-r-sky-800">{{ $loop->iteration }}</td>

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

                    <td class="py-5 border-l border-l-sky-800">
                      <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <button type="submit"
                          class="inline-flex items-center justify-center w-32 py-1.5 {{ $user->is_active ? 'bg-red-600' : 'bg-emerald-600' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:{{ $user->is_active ? 'bg-red-500' : 'bg-emerald-500' }} focus:{{ $user->is_active ? 'bg-red-500' : 'bg-emerald-500' }} active:{{ $user->is_active ? 'bg-red-700' : 'bg-emerald-700' }} focus:outline-none focus:ring-2 focus:{{ $user->is_active ? 'ring-red-500' : 'ring-emerald-500' }} focus:ring-offset-2 transition ease-in-out duration-150"">{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>


          {{ $users->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
