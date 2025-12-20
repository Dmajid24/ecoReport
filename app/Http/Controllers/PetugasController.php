<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
class PetugasController extends Controller
{
    public function index()
    {   
        $reports = Report::all();
        return view('petugas.index', compact('reports'));
    }

    public function updateStatus($id)
    {   
        $report = Report::findOrFail($id);
        $report->update(['status' => 'on_progress']);
        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui');
    }
}
