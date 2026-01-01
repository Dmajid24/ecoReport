<x-app-layout>
    <div class="max-w-5xl mx-auto mt-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                Report {{ $report->report_code }}
            </h2>

            {{-- Status Badge --}}
            <span class="px-3 py-1 text-sm rounded-full
                @if($report->status == 'pending') bg-yellow-100 text-yellow-700
                @elseif($report->status == 'process') bg-blue-100 text-blue-700
                @else bg-green-100 text-green-700
                @endif">
                {{ ucfirst($report->status) }}
            </span>

        </div>

        {{-- Content Card --}}
        <div class="bg-white shadow rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Left Content --}}
            <div class="space-y-4">

                <div class="flex">
                    <span class="w-32 text-gray-500">Report ID</span>
                    <span class="font-medium">{{ $report->id }}</span>
                </div>

                <div class="flex">
                    <span class="w-32 text-gray-500">Title</span>
                    <span class="font-medium">{{ $report->title }}</span>
                </div>

                <div class="flex">
                    <span class="w-32 text-gray-500">Issue Category</span>
                    <span class="font-medium">{{ $report->category->name }}</span>
                </div>

                <div class="flex">
                    <span class="w-32 text-gray-500">Location</span>
                    <span class="font-medium">{{ $report->location }}</span>
                </div>

                <div>
                    <span class="block text-gray-500 mb-1">Description</span>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $report->description }}
                    </p>
                </div>

                {{-- Action Button --}}
                @if($report->status == 'pending')
                    <form action="{{ route('petugas.updateStatus', $report) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button class="bg-gray-800 text-white px-5 py-2 rounded">
                            🔄 Ambil Laporan
                        </button>
                    </form>
                @endif


                @if(
                        $report->status == 'process' &&
                        $report->petugas_id == auth()->id()
                    )
                        <form action="{{ route('petugas.updateStatus', $report) }}"
                            method="POST"
                            enctype="multipart/form-data"
                            class="mt-4 space-y-3">

                            @csrf
                            @method('PUT')

                            <div>
                                <label class="text-sm text-gray-600">Upload Bukti</label>
                                <input type="file" name="proof_image" required class="w-full border rounded">
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Catatan Penyelesaian</label>
                                <textarea name="proof_note" required class="w-full border rounded p-2"></textarea>
                            </div>

                            <button class="bg-green-600 text-white px-5 py-2 rounded">
                                ✅ Selesaikan Laporan
                            </button>
                        </form>
                    @endif
                    @if(
                        $report->status == 'process' &&
                        $report->petugas_id !== auth()->id()
                    )
                        <p class="text-sm text-gray-500 italic mt-4">
                            Laporan ini sedang diproses oleh petugas lain
                        </p>
                    @endif


            </div>

            {{-- Right Image --}}
            <div class="flex justify-center items-start">
                @if($report->photo_before)
                    <img
                    src="{{ asset('storage/' . $report->photo_before) }}"
                    class="rounded-lg border max-h-64 object-cover"
                    alt="Foto laporan"
                    >
                @else
                    <div class="text-gray-400 italic">
                        No image available
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
