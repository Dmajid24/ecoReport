<x-app-layout>
    <h2>Laporan Saya</h2>

    <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @foreach($report as $rep)
        <div class="border p-2 mb-2">
            <strong>{{ $rep->title }}</strong>
            <div>Status: {{ $rep->status }}</div>
        </div>
    @endforeach
</x-app-layout>
