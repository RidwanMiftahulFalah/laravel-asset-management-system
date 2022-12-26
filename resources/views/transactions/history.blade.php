<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Riwayat Transaksi') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          @if (session('message'))
            <div class="message">
              {{ session('message') }}
            </div>
          @endif

          <table class="table-auto border-collapse border border-slate-500">
            <tr>
              <th class="py-2 px-2 border border-slate-400">Tanggal Transaksi</th>
              <th class="py-2 px-2 border border-slate-400">Nama Penerima</th>
              <th class="py-2 px-2 border border-slate-400">Nama Aset</th>
              <th class="py-2 px-2 border border-slate-400">Jumlah</th>
              <th class="py-2 px-2 border border-slate-400">Ruangan Penempatan</th>
              <th class="py-2 px-2 border border-slate-400">Status</th>
              <th class="py-2 px-2 border border-slate-400">Operasi</th>
            </tr>

            @foreach ($transactions as $transaction)
              <tr>
                <td class="py-1 px-2 border border-slate-400">{{ $transaction->date }}</td>
                <td class="py-1 px-2 border border-slate-400">{{ $transaction->recipient_name }}</td>
                <td class="py-1 px-2 border border-slate-400">{{ $transaction->item->name }}</td>
                <td class="py-1 px-2 border border-slate-400">{{ $transaction->quantity }}</td>
                <td class="py-1 px-2 border border-slate-400">{{ $transaction->room->name }}</td>
                <td class="py-1 px-2 border border-slate-400">{{ $transaction->status }}</td>
                <td class="py-1 px-2 border border-slate-400">
                  @if ($transaction->status == 'Pending')
                    <a href="{{ route('transactions.edit', $transaction->id) }}">Selesaikan Transaksi</a>
                  @endif
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
