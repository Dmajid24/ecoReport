<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Tambah User</h2>
    </x-slot>

    <form action="{{ route('users.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf

        <div class="mb-3">
            <label class="font-semibold">Nama</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="font-semibold">Role</label>
            <select name="role" class="w-full p-2 border rounded" required>
                <option value="student">Student</option>
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
                <option value="superadmin">Super Admin</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="font-semibold">Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label class="font-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    </form>
</x-app-layout>
