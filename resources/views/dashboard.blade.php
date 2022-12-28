<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <div class="h-48 max-w-screen mb-8 flex flex-wrap justify-between">
            <div class="bg-gradient-to-br from-blue-400 to-emerald-500 rounded-2xl w-96 h-full text-white">
              <div class="h-4/6 flex items-center justify-center px-5 text-6xl font-bold">
                {{ $totalTransactions }}
              </div>
              <div class="h-2/6 flex items-center justify-end px-5 font-semibold text-lg">
                Jumlah Transaksi
              </div>
            </div>

            <div class="bg-gradient-to-br from-red-400 to-blue-700 rounded-2xl w-96 h-full text-white">
              <div class="h-4/6 flex items-center justify-center px-5 text-6xl font-bold">
                {{ $totalItems }}
              </div>
              <div class="h-2/6 flex items-center justify-end px-5 font-semibold text-lg">
                Jumlah Aset
              </div>
            </div>


            <div class="bg-gradient-to-br from-amber-400 to-rose-600 rounded-2xl w-96 h-full text-white">
              <div class="h-4/6 flex items-center justify-center px-5 text-6xl font-bold">
                {{ $totalUsers }}
              </div>
              <div class="h-2/6 flex items-center justify-end px-5 font-semibold text-lg">
                Jumlah Pengguna
              </div>
            </div>
          </div>

          <h1 class="text-xl font-bold text-gray-900 mb-3">
            Semua Riwayat Transaksi
          </h1>

          <div class="max-w-screen overflow-x-auto">
            <table class="w-full table-auto">
              <thead class="bg-sky-800 text-white">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Tanggal</th>

                  <th class="py-2 px-2">Nama User</th>

                  <th class="py-2 px-2">Nama Penerima</th>

                  <th class="py-2 px-2 w-3/12">Nama Aset</th>

                  <th class="py-2 px-2">Jumlah</th>

                  <th class="py-2 px-2">Ruangan</th>

                  <th class="py-2 px-2 rounded-tr-lg">Status</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">

                @foreach ($transactions as $transaction)
                  <tr class="{{ !$loop->iteration === $transactions->count() ? 'border-b border-sky-800' : '' }}">
                    <td
                      class="py-3 px-3 border-r border-r-sky-800 {{ $loop->iteration === $transactions->count() ? 'rounded-bl-lg' : '' }}">
                      {{ $loop->iteration }}
                    </td>

                    <td>{{ $transaction->date }}</td>

                    <td>{{ $transaction->user->name }}</td>

                    <td>{{ $transaction->recipient_name }}</td>

                    <td>{{ $transaction->item->name }}</td>

                    <td>{{ $transaction->quantity }}</td>

                    <td>{{ $transaction->room->name }}</td>

                    <td
                      class="py-3 px-2 {{ $loop->iteration === $transactions->count() ? 'rounded-br-lg' : '' }} flex justify-center">
                      <div
                        class="py-1 w-20 text-sm text-white font-bold rounded-full {{ $transaction->status === 'Pending' ? 'bg-amber-500' : 'bg-emerald-700' }}">
                        {{ $transaction->status }}
                      </div>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>

          {{ $transactions->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
