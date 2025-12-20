<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit User</h2>
    </x-slot>

    <form action="{{ route('users.update', $user) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="font-semibold">Nama</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label class="font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label class="font-semibold">Role</label>
            <select name="role" class="w-full p-2 border rounded">
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="font-semibold">Password (kosongkan jika tidak ganti)</label>
            <input type="password" name="password" class="w-full p-2 border rounded">
        </div>

        <div class="mb-3">
            <label class="font-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    </form>
</x-app-layout>
