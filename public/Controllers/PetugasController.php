<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
class PetugasController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
    
        return view('petugas.index', [
            'pendingReports' => Report::where('status', 'pending')->latest()->get(),
            'processReports' => Report::where('status', 'process')->latest()->get(),
            'notDoneReports' => Report::where('status',  'process')
            ->orWhere('status','pending')
            ->latest()->get()->filter(function ($report) use ($userId) {
                return $report->petugas_id !== $userId;
            }),
            'myReports' => Report::where('status', 'process')
                ->where('petugas_id', $userId)
                ->latest()
                ->get(),
            'myDoneReports' => Report::where('status', 'done')
                ->where('petugas_id', $userId)
                ->latest()
                ->get(),
        ]);
    }
    
    
    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
    
        /**
         * 🔒 pending → process
         * siapa cepat dia dapat
         */
        if ($report->status === 'pending') {
    
            $report->update([
                'status'       => 'process',
                'petugas_id'   => auth()->id(),
                'processed_at' => now(),
            ]);
    
            return back()->with('success', 'Laporan diambil & sedang diproses');
        }
    
        /**
         * 🔒 process → done
         * hanya petugas yang mengambil
         */
        if ($report->status === 'process') {
    
            if ($report->petugas_id !== auth()->id()) {
                abort(403, 'Anda tidak berhak menyelesaikan laporan ini');
            }
    
            $request->validate([
                'proof_image' => 'required|image|max:2048',
                'proof_note'  => 'required|string',
            ]);
    
            $path = $request->file('proof_image')
                            ->store('proofs', 'public');
    
            $report->update([
                'status'      => 'done',
                'proof_image' => $path,
                'proof_note'  => $request->proof_note,
                'done_at'     => now(),
            ]);
    
            return back()->with('success', 'Laporan berhasil diselesaikan');
        }
    
        return back()->with('error', 'Status tidak valid');
    }

    
    public function show($id)
    {   
        $report=Report::with('user')->findOrFail($id);
        return view('petugas.detail',compact('report'));
    }

}
