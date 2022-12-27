<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ubah Data Unit Kerja') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <form action="{{ route('work_units.update', $workUnit->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="block font-medium text-sm text-gray-700">
                Nama Unit Kerja
              </label>
              <input type="text" name="name" id="name" value="{{ $workUnit->name }}"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
              Simpan
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
