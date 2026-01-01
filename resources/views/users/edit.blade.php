<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Edit User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- CARD --}}
            <div class="bg-green dark:bg-green-500 shadow rounded-lg p-6">

             
                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 dark:bg-red-900 p-4 text-red-700 dark:text-red-300">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- NAMA --}}
                    <div>
                        <label class="block text-sm font-medium text-black-700 dark:text-black-300">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600
                                      dark:bg-white-700 dark:text-green:800 text-green
                                      focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label class="block text-sm font-medium text-black">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600
                                      dark:bg-white-700 dark:text-green:800 text-green
                                      focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                    </div>

                    {{-- ROLE --}}
                    <div>
                        <label class="block text-sm font-medium text-black">
                            Role User
                        </label>
                        <select name="role"
                                class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600
                                      dark:bg-white-700 dark:text-green:800 text-green
                                      focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                            <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                        </select>

                        <p class="text-xs text-white mt-1">
                            ⚠️ Perubahan role mempengaruhi hak akses user.
                        </p>
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label class="block text-sm font-medium text-black">
                            Password Baru
                        </label>
                        <input type="password" name="password"
                               class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600
                                      dark:bg-white-700 dark:text-green:800 text-green
                                      focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="text-xs text-white mt-1">
                            Kosongkan jika tidak ingin mengganti password.
                        </p>
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div>
                        <label class="block text-sm font-medium text-black">
                            Konfirmasi Password
                        </label>
                        <input type="password" name="password_confirmation"
                               class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600
                                      dark:bg-white-700 dark:text-green:800 text-green
                                      focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    {{-- ACTION --}}
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('users.index') }}"
                           class="add-btn px-4 py-2 rounded-md border text-green-300 bg-green-100   hover:text-white dark:text-green-900
                                  hover:bg-red-100 dark:hover:bg-red-700 transition">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-green-100 text-green:300 hover:text-white rounded-md
                                       hover:bg-green-400 transition">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
