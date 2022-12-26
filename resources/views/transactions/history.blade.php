<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
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


          <table>
            <tr>
              <td>Tanggal Transaksi</td>
              <th>Nama Penerima</th>
              <th>Nama Aset</th>
              <th>Jumlah</th>
              <th>Ruangan Penempatan</th>
              <th>Status</th>
              <th>Operasi</th>
            </tr>

            @foreach ($transactions as $transaction)
              <tr>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->recipient_name }}</td>
                <td>{{ $transaction->item->name }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->room->name }}</td>
                <td>{{ $transaction->status }}</td>
                <td>
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
