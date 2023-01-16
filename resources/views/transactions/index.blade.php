<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaksi') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
              <span class="font-semibold">{{ session('error') }}</span>
            </div>
          @endif

          <div class="flex w-full space-x-3">
            <div class="mb-3 w-1/2">
              <form action="{{ route('transactions.index') }}" method="get">
                @csrf

                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                  </div>
                  <input type="text" name="search" value="{{ request('search') }}" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari Nama Aset">
                  <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
              </form>
            </div>

            <button id="show-qr-scanner"
              class="inline-flex items-center mb-3 px-4 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Scan QR Code
            </button>
          </div>

          {{-- <div class="w-full flex justify-center"> --}}
          <div id="reader" class="w-96 h-96 mb-3" style="display: none"></div>
          {{-- </div> --}}

          <div class="max-w-screen overflow-auto">
            <table class="w-full table-auto">
              <thead class="bg-sky-800 text-white">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Nama Aset</th>

                  <th class="py-2 px-2">Stok</th>

                  <th class="py-2 px-2">Kondisi Aset</th>

                  <th class="py-2 px-2">Hak Pakai</th>

                  <th class="py-2 px-2">Kategori</th>

                  <th class="py-2 px-2">Sifat Aset</th>

                  <th class="py-2 px-2">Status</th>

                  <th class="py-2 px-2 rounded-tr-lg">Opsi</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($items->count())
                  @foreach ($items as $item)
                    <tr class="{{ $loop->iteration != $items->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="py-3 px-2 border-r border-r-sky-800 {{ $loop->iteration == $items->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}
                      </td>

                      <td class="py-3 px-2">{{ $item->name }}</td>

                      <td class="py-3 px-2">{{ $item->stock }}</td>

                      <td class="py-3 px-2">{{ $item->condition }}</td>

                      <td class="py-3 px-2">{{ $item->usage_permission }}</td>

                      <td class="py-3 px-2">{{ $item->category->name }}</td>

                      <td class="py-3 px-2">{{ $item->is_disposable ? 'Habis Pakai' : 'Tidak Habis Pakai' }}</td>

                      <td class="py-3 px-2">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</td>

                      <td
                        class="py-3 px-2  border-l border-l-sky-800 {{ $loop->iteration === $items->count() ? 'rounded-br-lg' : '' }}">
                        <a href="{{ route('transactions.create', ['id' => $item->id]) }}"
                          class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Pilih</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="8">Data tidak ditemukan.</td>
                @endif
              </tbody>
            </table>
          </div>

          {{ $items->links() }}
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script>
    const showScannerBtn = document.getElementById('show-qr-scanner');
    const scanner = document.getElementById('reader');

    let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 60,
        qrbox: {
          width: 250,
          height: 250,
          rememberLastUsedCamera: true,
        }
      },
      /* verbose= */
      false);

    showScannerBtn.addEventListener('click', function() {
      // scanner.style.display === 'none' ? scanner.style.display = 'block' : scanner.style.display = 'none';

      if (scanner.style.display === 'none') {
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        scanner.style.display = 'block';
        showScannerBtn.innerText = 'Stop Scanning';
        showScannerBtn.className =
          'inline-flex items-center mb-3 px-4 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150';
      } else if (scanner.style.display === 'block') {
        html5QrcodeScanner.clear();
        scanner.style.display = 'none';
        showScannerBtn.innerText = 'Scan QR Code';
        showScannerBtn.className =
          'inline-flex items-center mb-3 px-4 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150';
      }

      function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code
        let url = `{{ route('transactions.create', ['id' => 'scan_result']) }}`;
        window.location.href = url.replace('scan_result', decodedText);
        html5QrcodeScanner.clear();
      }

      function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
      }

      // html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    });
  </script>
</x-app-layout>
