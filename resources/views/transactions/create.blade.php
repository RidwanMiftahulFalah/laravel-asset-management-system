<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Detail Transaksi') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
              role="alert">
              <ul class="mx-4 list-disc list-outside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('transactions.store') }}" method="post">
            @csrf

            <input type="hidden" name="item_id" value="{{ $item->id }}">

            <div class="mb-3">
              <label for="recipient-name" class="block font-medium text-sm text-gray-700">
                Nama Penerima
              </label>
              <input type="text" name="recipient_name" id="recipient-name"
                class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('recipient_name') }}">
            </div>

            <div class="mb-3">
              <label for="asset-name" class="block font-medium text-sm text-gray-700">
                Nama Aset
              </label>
              <input type="text" name="name" id="name" readonly
                class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ $item->name }}">
            </div>

            <div class="mb-3">
              <label for="quantity" class="block font-medium text-sm text-gray-700">
                Jumlah
              </label>
              <input type="number" name="quantity" id="quantity"
                class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('quantity') }}">
            </div>

            <div class="mb-5">
              <label for="placement-location" class="block font-medium text-sm text-gray-700">
                Lokasi Penempatan
              </label>
              <input type="text" name="placement_location" id="placement-location"
                class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{ old('placement_location') }}">
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Checkout
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
