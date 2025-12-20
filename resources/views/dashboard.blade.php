<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Dashboard</h1>

    @if(Auth::user()->role === 'student')
        <a href="{{ route('reports.create') }}">Buat Laporan</a>
    @endif

    @if(Auth::user()->role === 'superadmin')
        <a href="{{ route('users.index') }}">Kelola User</a>
    @endif
</x-app-layout>
