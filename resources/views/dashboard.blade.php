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

          <div class="h-40 max-w-screen mb-5 flex flex-wrap justify-between">
            <div class="bg-blue-300 rounded-2xl w-96 h-40">
              {{ $totalTransactions }}
            </div>

            <div class="bg-blue-300 rounded-2xl w-96 h-40">
              {{ $totalItems }}
            </div>

            <div class="bg-blue-300 rounded-2xl w-96 h-40">
              {{ $totalUsers }}
            </div>
          </div>

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
                  <tr class="border-b border-sky-800">
                    <td class="py-3 px-3 border-r border-r-sky-800">{{ $loop->iteration }}</td>

                    <td>{{ $transaction->date }}</td>

                    <td>{{ $transaction->user->name }}</td>

                    <td>{{ $transaction->recipient_name }}</td>

                    <td>{{ $transaction->item->name }}</td>

                    <td>{{ $transaction->quantity }}</td>

                    <td>{{ $transaction->room->name }}</td>

                    <td class="py-3 px-2 flex justify-center">
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
