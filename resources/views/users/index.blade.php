<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Manajemen User</h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <a href="{{ route('users.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">
            Tambah User
        </a>

        <table class="w-full text-left border mt-4">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-3">Nama</th>
                    <th class="py-2 px-3">Email</th>
                    <th class="py-2 px-3">Role</th>
                    <th class="py-2 px-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="py-2 px-3">{{ $u->name }}</td>
                    <td class="py-2 px-3">{{ $u->email }}</td>
                    <td class="py-2 px-3">{{ $u->role }}</td>
                    <td class="py-2 px-3 flex gap-2">
                        <a href="{{ route('users.edit', $u->id) }}" class="text-yellow-600">Edit</a>

                        <form action="{{ route('users.destroy', $u->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="text-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
