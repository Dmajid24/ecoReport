<x-app-layout>
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-whites-800 leading-tight">
            Student Dashboard
        </h2>
        <p class="text-sm text-gray-500">
            Report environmental issues on campus effectively.
        </p>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Button -->
            <div class="create-btn">
                <a href="{{ route('reports.create') }}" >
                    Create New Report
                </a>
            </div>

            <!-- Statistik -->
          
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">Total Reports</p>
                    <h3 class="text-2xl font-bold">{{ $totalReports }}</h3>
                </div>
            
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">Pending Reports</p>
                    <h3 class="text-2xl font-bold text-yellow-500">{{ $pendingReports }}</h3>
                </div>
            
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">In Progress</p>
                    <h3 class="text-2xl font-bold text-blue-500">{{ $inProgressReports }}</h3>
                </div>
            
                <div class="bg-white p-4 rounded shadow">
                    <p class="text-gray-500">Completed</p>
                    <h3 class="text-2xl font-bold text-green-600">{{ $completedReports }}</h3>
                </div>
            </div>
            
            

            <!-- Recent Reports -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Recent Reports</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full border text-sm">
                        <thead class="bg-green-900">
                            <tr>
                                <th class="px-3 py-2 text-left text-white">Report ID</th>
                                <th class="px-3 py-2 text-left text-white">Category</th>
                                <th class="px-3 py-2 text-left text-white">Status</th>
                                <th class="px-3 py-2 text-left text-white">Submission Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentReports as $report)
                                <tr class="border-t">
                                    <td class="px-3 py-2">ER{{ $report->id }}</td>
                                    <td class="px-3 py-2">{{ $report->category->name }}</td>
                                    <td class="px-3 py-2">
                                        <span class="px-2 py-1 rounded text-xs
                                            @if($report->status == 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($report->status == 'process') bg-blue-100 text-blue-700
                                            @elseif($report->status == 'done') bg-green-100 text-green-700
                                            @endif">
                                            {{ ucfirst(str_replace('_',' ',$report->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2">
                                        {{ $report->created_at->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-gray-500">
                                        No reports yet
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
