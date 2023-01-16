<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Cetak Laporan') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <h2 class="text-lg font-semibold text-gray-900 mb-3">
            Laporan Transaksi
          </h2>

          @if (session('message'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg"
              role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          <form action="{{ route('reports.transactionsPDF') }}" method="get">
            @csrf

            <div class="mb-3">
              <label for="start-date" class="block font-medium text-sm text-gray-700">
                Tanggal Awal
              </label>
              <input type="date" name="start_date" id="start-date"
                class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('start_date') }}">
            </div>

            <div class="mb-3">
              <label for="end-date" class="block font-medium text-sm text-gray-700">
                Tanggal Akhir
              </label>
              <input type="date" name="end_date" id="end-date"
                class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('end_date') }}">
            </div>

            <button type="submit"
              class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Unduh Laporan Transaksi
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
