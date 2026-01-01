<x-app-layout>
    <div class="max-w-6xl mx-auto mt-6">

        <h2 class="text-2xl font-semibold mb-6">
            Dashboard Petugas
        </h2>

        {{-- Summary --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
                <p class="text-sm">Pending</p>
                <p class="text-2xl font-bold">
                    {{ $pendingReports->count() }}
                </p>
            </div>
            <div class="bg-green-100 text-white-800 p-4 rounded">
                <p class="text-sm">Other Process</p>
                <p class="text-2xl font-bold">
                    {{ $processReports->count()}}

                </p>
            </div>
            <div class="bg-blue-100 text-blue-800 p-4 rounded">
                <p class="text-sm">My Process</p>
                <p class="text-2xl font-bold">
                    {{ $myReports->count() }}
                </p>
            </div>
        </div>

        {{-- ===================== --}}
        {{-- LAPORAN PENDING --}}
        {{-- ===================== --}}
        <h3 class="text-lg font-semibold mb-3">📌 Laporan</h3>

        @if($notDoneReports->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                @foreach($notDoneReports as $report)
                    <a href="{{ route('petugas.show', $report) }}"
                       class="block bg-white shadow hover:shadow-lg transition rounded-lg p-5 border
                              no-underline text-gray-800">

                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-lg">
                                {{ $report->title }}
                            </h3>

                            <span class="text-xs px-2 py-1 rounded-full bg-yellow-200 text-yellow-800">
                                Pending
                            </span>
                        </div>

                        <p class="text-sm text-gray-500 mb-2">
                            {{ $report->category->name }} • {{ $report->location }}
                        </p>

                        <p class="text-gray-700 text-sm line-clamp-2">
                            {{ $report->description }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 italic mb-6">Tidak ada laporan pending</p>
        @endif

        {{-- ===================== --}}
        {{-- LAPORAN SAYA --}}
        {{-- ===================== --}}
        <h3 class="text-lg font-semibold mb-3">🛠️ Laporan Diambil</h3>

        @if($myReports->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($myReports as $report)
                    <a href="{{ route('petugas.show', $report) }}"
                       class="block bg-blue-50 shadow hover:shadow-lg transition rounded-lg p-5 border
                              no-underline text-gray-800">

                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-lg">
                                {{ $report->title }}
                            </h3>

                            <span class="text-xs px-2 py-1 rounded-full bg-blue-200 text-blue-800">
                                Process
                            </span>
                        </div>

                        <p class="text-sm text-gray-600 mb-1">
                            Diproses sejak:
                            {{ $report->processed_at?->format('d M Y H:i') }}
                        </p>

                        <p class="text-gray-700 text-sm line-clamp-2">
                            {{ $report->description }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 italic">
                Kamu belum mengambil laporan apa pun
            </p>
        @endif

        <h3 class="text-lg font-semibold mb-3">🛠️ Laporan Selesai</h3>

        @if($myDoneReports->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($myDoneReports as $report)
                    <a href="{{ route('petugas.show', $report) }}"
                       class="block bg-blue-50 shadow hover:shadow-lg transition rounded-lg p-5 border
                              no-underline text-gray-800">

                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-lg">
                                {{ $report->title }}
                            </h3>

                            <span class="text-xs px-2 py-1 rounded-full bg-green-200 text-green-800">
                                {{$report->status}}
                            </span>
                        </div>

                        <p class="text-sm text-gray-600 mb-1">
                            Diproses sejak:
                            {{ $report->processed_at?->format('d M Y H:i') }}
                        </p>

                        <p class="text-gray-700 text-sm line-clamp-2">
                            {{ $report->description }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 italic">
                Kamu belum menyelesaikan laporan apa pun
            </p>
        @endif

    </div>
</x-app-layout>
