<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Riwayat Transaksi') }}
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

          <a href="{{ route('transactions.index') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambahkan
            Transaksi Baru</a>

          <table class="w-full table-auto">
            <thead class="bg-sky-800 text-white">
              <tr>
                <th class="py-2 px-2 rounded-tl-lg">#</th>

                <th class="py-2 px-2">Tanggal</th>

                <th class="py-2 px-2">Nama Penerima</th>

                <th class="py-2 px-2 w-3/12">Nama Aset</th>

                <th class="py-2 px-2">Jumlah</th>

                <th class="py-2 px-2">Ruangan</th>

                <th class="py-2 px-2">Status</th>

                <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
              </tr>
            </thead>

            <tbody class="text-center bg-slate-200">

              @foreach ($transactions as $transaction)
                <tr class="border-b border-sky-800">
                  <td class="py-3 px-3 border-r border-r-sky-800">{{ $loop->iteration }}</td>

                  <td>{{ $transaction->date }}</td>

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

                  <td class="py-3 px-2 border-l border-l-sky-800">
                    @if ($transaction->status == 'Pending')
                      <a href="{{ route('transactions.edit', $transaction->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Selesaikan Transaksi
                      </a>
                    @else
                      <div
                        class="inline-flex items-center px-4 py-2 bg-slate-400 border border-transparent rounded-md font-semibold text-xs text-slate-200 uppercase tracking-widest ">
                        Selesaikan Transaksi
                      </div>
                    @endif
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
