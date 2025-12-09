<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path = $request->file('foto') ? $request->file('foto')->store('laporan') : null;

        $laporan = Laporan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'foto' => $path,
            'status' => 'pending',
        ]);

        return response()->json($laporan);
    }

    public function index()
    {
        return Laporan::with('user')->latest()->get();
    }

    public function show($id)
    {
        return Laporan::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->update($request->only('judul','deskripsi','lokasi'));

        return response()->json(['msg' => 'Updated', 'data' => $laporan]);
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        if ($laporan->foto) {
            Storage::delete($laporan->foto);
        }
        $laporan->delete();

        return response()->json(['msg' => 'Deleted']);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,on_progress,done']);

        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status' => $request->status]);

        return response()->json(['msg' => 'Status updated', 'status' => $laporan->status]);
    }

    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'foto_bukti' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $laporan = Laporan::findOrFail($id);
        $path = $request->file('foto_bukti')->store('bukti');

        $laporan->update(['foto_bukti' => $path, 'status' => 'done']);

        return response()->json(['msg' => 'Bukti uploaded']);
    }
}
