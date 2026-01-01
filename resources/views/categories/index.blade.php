<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black-200">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- INFO --}}
            <div class="bg-white-500 dark:bg-white-600 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-black-100">
                    Manajemen Data
                </h3>
                <p class="text-sm text-gray-500 dark:text-black">
                    Kelola kategori sampah yang digunakan dalam sistem pelaporan kampus.
                </p>
            </div>

            {{-- STAT CARD --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-5 rounded-lg shadow">
                    <p class="text-sm text-black">Total Kategori</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-black-100">
                        {{ $categories->count() }}
                    </p>
                </div>

                {{-- Placeholder Lokasi --}}
                <div class="bg-green-100 dark:bg-green-700 p-5 rounded-lg border border-dashed text-center">
                    <p class="text-sm text-green-500 dark:text-green-300">
                        Lokasi Kampus
                    </p>
                    <p class="text-xs italic text-green-400">
                        (Fitur akan ditambahkan)
                    </p>
                </div>
            </div>

            {{-- KATEGORI LIST --}}
            <div class="bg-white dark:bg-white-500 shadow rounded-lg">
                <div class="flex items-center justify-between p-6 border-b dark:border-w-700 bg-green-900">
                    <h3 class="text-lg font-semibold text-white">
                        Kategori Sampah
                    </h3>

                    <a href="{{ route('categories.create') }}"
                       class="add-btn inline-flex items-center px-4 py-2 bg-green-100 border border-transparent rounded-md font-semibold text-xs text-green-900 uppercase tracking-widest hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                        + Tambah Kategori
                    </a>
                </div>

                <div class="p-6">
                    @if($categories->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($categories as $cat)
                                <div class="border rounded-lg p-4 dark:border-gray-700 bg-white">
                                    <p class="font-medium text-black-800 dark:text-black-100">
                                        {{ $cat->name }}
                                    </p>

                                    <form action="{{ route('categories.destroy', $cat) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2
                                                bg-red-100 text-red-600
                                                border border-transparent rounded-md
                                                font-semibold text-xs uppercase tracking-widest
                                                hover:bg-red-700 hover:text-white hover:border-red-600
                                                focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
                                                transition">
                                            Hapus
                                        </button>

                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500 dark:text-black-400 italic">
                            Belum ada kategori.
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
