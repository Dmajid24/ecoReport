<x-app-layout>
    <h2>Daftar Laporan Masuk</h2>

    @foreach($reports as $report)
        <div class="border p-2 mb-2">
            <strong>{{ $report->title }}</strong>

            <form action="/petugas/reports/{{ $report->id }}/update-status" method="POST">
                @csrf
                <button class="btn btn-warning">Proses</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
