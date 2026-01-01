<div class="w-64 p-4 border-r h-screen bg-white dark:bg-gray-800">
    @if(Auth::user()->role === 'student')
        <a href="{{ route('reports.index') }}" class="block py-2">Laporan Saya</a>
    @endif

    @if(Auth::user()->role === 'petugas')
        <a href="/petugas/reports" class="block py-2">Daftar Laporan Masuk</a>
    @endif

    @if(Auth::user()->role === 'admin')
        <a href="{{ route('categories.index') }}" class="block py-2">Kategori</a>
    @endif

    @if(Auth::user()->role === 'superadmin')
        <a href="{{ route('users.index') }}" class="block py-2">Manajemen User</a>
    @endif
</div>
