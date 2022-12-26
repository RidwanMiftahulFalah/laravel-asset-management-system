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
            <div class="message">
              {{ session('message') }}
            </div>
          @endif

          <a href="{{ route('transactions.index') }}"
            class="inline-block mb-3 px-6 py-2.5 bg-emerald-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-emerald-700 hover:shadow-lg focus:bg-emerald-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-emerald-800 active:shadow-lg transition duration-150 ease-in-out">Tambahkan
            Transaksi Baru</a>

          <table class="w-full table-auto">
            <thead class="bg-sky-800 text-white">
              <tr>
                <th class="py-2 px-2 rounded-tl-lg">Tanggal Transaksi</th>
                <th class="py-2 px-2">Nama Penerima</th>
                <th class="py-2 px-2 w-3/12">Nama Aset</th>
                <th class="py-2 px-2">Jumlah</th>
                <th class="py-2 px-2">Ruangan Penempatan</th>
                <th class="py-2 px-2">Status</th>
                <th class="py-2 px-2 rounded-tr-lg">Operasi</th>
              </tr>
            </thead>

            <tbody class="text-center bg-slate-200">
              @foreach ($transactions as $transaction)
                <tr class="border-b border-sky-800">
                  <td class="py-1 px-2">{{ $transaction->date }}</td>
                  <td class="py-1 px-2">{{ $transaction->recipient_name }}</td>
                  <td class="py-1 px-2">{{ $transaction->item->name }}</td>
                  <td class="py-1 px-2">{{ $transaction->quantity }}</td>
                  <td class="py-1 px-2">{{ $transaction->room->name }}</td>
                  <td class="py-1 px-2">
                    <div
                      class="py-1 px-2 text-sm text-white font-bold rounded-full {{ $transaction->status === 'Pending' ? 'bg-amber-500' : 'bg-emerald-700' }}">
                      {{ $transaction->status }}
                    </div>
                  </td>
                  <td class="py-1 px-2">
                    @if ($transaction->status == 'Pending')
                      <a href="{{ route('transactions.edit', $transaction->id) }}"
                        class="inline-block my-3 px-6 py-2.5 bg-slate-700 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-slate-800 hover:shadow-lg focus:bg-slate-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-slate-900 active:shadow-lg transition duration-150 ease-in-out">Selesaikan
                        Transaksi</a>
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
