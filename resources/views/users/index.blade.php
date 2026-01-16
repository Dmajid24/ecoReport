<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-black-800 dark:text-black-200">
                Manajemen User
            </h2>

            <a href="{{ route('users.create') }}"
               class="add-btn inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-600
                      text-green dark:text-green-900 text-sm font-semibold rounded-md
                      hover:bg-gray-700 dark:hover:bg-white transition">
                + Tambah User
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- FLASH MESSAGE --}}
            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-900 p-4 text-green-300">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="mb-4 rounded-md bg-red-900 p-4 text-red-200">
                    {{ session('danger') }}
                </div>
            @endif

            {{-- CARD --}}
            <div class="bg-green-100 dark:bg-green-100 shadow rounded-lg overflow-hidden">

                {{-- TABLE --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-green-50 dark:bg-green-700 text-white dark:text-white uppercase text-xs">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Role</th>
                                <th class="px-6 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y dark:divide-gray-700">
                            @foreach($users as $u)
                                <tr class="hover:bg-green-50 dark:hover:bg-green-700 transition">
                                    <td class="px-6 py-4 font-medium text-black-800 dark:text-black-100">
                                        {{ $u->name }}
                                    </td>

                                    <td class="px-6 py-4 text-black-600 dark:text-black-300">
                                        {{ $u->email }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full
                                            @if($u->role === 'superadmin') bg-red-100 text-red-700
                                            @elseif($u->role === 'admin') bg-blue-100 text-blue-700
                                            @elseif($u->role === 'petugas') bg-yellow-100 text-yellow-700
                                            @else bg-gray-100 text-gray-700 @endif">
                                            {{ ucfirst($u->role) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 flex justify-end gap-3">

                                        {{-- EDIT --}}
                                        <a href="{{ route('users.edit', $u->id) }}"
                                           class="add-btn text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                            Edit
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('users.destroy', $u->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Hapus
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="p-4 border-t dark:border-gray-700">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
