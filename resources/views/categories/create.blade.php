<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black-200">
            Tambah Kategori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            
            {{-- CARD --}}
            <div class="bg-white-300 dark:bg-white shadow rounded-lg p-6">

                {{-- FORM --}}
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    {{-- INPUT --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-white-900 dark:text-black-300 mb-1">
                            Nama Kategori
                        </label>
                        <input 
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Plastik, Kertas"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-300 dark:text-black focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="mb-4 rounded-md bg-red-50 dark:bg-red-900 p-4">
                            <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-300">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- BUTTON --}}
                    <div class="add-btn flex justify-end">
                        <a href="{{ route('categories.index') }}"
                           class="mr-3 inline-flex items-center px-4 py-2 border border-black dark:border-black rounded-md text-sm text-black-700 dark:text-black hover:bg-red-100 dark:hover:bg-red-700 transition">
                            Batal
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
