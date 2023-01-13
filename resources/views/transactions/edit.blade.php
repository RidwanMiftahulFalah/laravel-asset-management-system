<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Selesaikan Transaksi') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <form
            action="{{ route('transactions.update', ['transaction' => $transaction->id, 'item_id' => $transaction->item_id]) }}"
            method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="date" class="block font-medium text-sm text-gray-700">
                Tanggal Transaksi
              </label>
              <input type="text" id="date" readonly value="{{ $transaction->date }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="block font-medium text-sm text-gray-700">
                Nama Penerima
              </label>
              <input type="text" id="recipient-name" readonly value="{{ $transaction->recipient_name }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <div class="mb-3">
              <label for="item-name" class="block font-medium text-sm text-gray-700">
                Nama Aset
              </label>
              <input type="text" id="item-name" readonly value="{{ $transaction->item->name }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <div class="mb-3">
              <label for="quantity" class="block font-medium text-sm text-gray-700">
                Jumlah
              </label>
              <input type="text" id="quantity" readonly value="{{ $transaction->quantity }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <div class="mb-3">
              <label for="placement-location" class="block font-medium text-sm text-gray-700">
                Lokasi Penempatan
              </label>
              <input type="text" id="placement-location" readonly value="{{ $transaction->placement_location }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>
            
            <div class="mb-5">
              <label class="block font-medium text-sm text-gray-700">
                Kondisi Aset
              </label>

              <div class="flex">
                <div class="flex items-center mr-4">
                  <input id="layak-pakai" type="radio" value="Layak Pakai" name="condition" checked
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="layak-pakai" class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                    Layak Pakai
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="rusak" type="radio" value="Rusak" name="condition"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="rusak" class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                    Rusak
                  </label>
                </div>

                <div class="flex items-center mr-4">
                  <input id="hilang" type="radio" value="Hilang" name="condition"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="hilang" class="ml-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                    Hilang
                  </label>
                </div>
              </div>
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Selesaikan Transaksi
            </button>

          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
