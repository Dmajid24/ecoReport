<x-app-layout>
    <h2>Daftar Laporan Masuk</h2>

    @foreach($reports as $report)
        <div class="border p-2 mb-2">
            <strong>{{ $report->title }}</strong>
            <p>{{ $report->description }}</p>
            <p>{{ $report->status }}</p>

            <form action="/petugas/reports/{{ $report->id }}/update-status" method="POST">
                @csrf
                <input type="hidden" name="status" value="on_progress">
            
                <button
                    class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700">
                    Proses
                </button>
            </form>
            
        </div>
    @endforeach
</x-app-layout>
