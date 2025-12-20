<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'photo_before' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path = $request->file('photo_before') ? $request->file('photo_before')->store('Report') : null;

        $Report = Report::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'photo_before' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat');
    }


    public function index()
    {   
        $report= Report::with('user')->latest()->get();
        return view('reports.index',compact('report'));
    }

    public function show($id)
    {   
        $reports=Report::with('user')->findOrFail($id);
        return view('reports.show',compact('reports'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('reports.create', compact('categories'));
        
    }

    public function update(Request $request, $id)
    {
        $Report = Report::findOrFail($id);

        $Report->update($request->only('title','description','location'));

        return response()->json(['msg' => 'Updated', 'data' => $Report]);
    }

    public function destroy($id)
    {
        $Report = Report::findOrFail($id);
        if ($Report->photo_before) {
            Storage::delete($Report->photo_before);
        }
        $Report->delete();

        return response()->json(['msg' => 'Deleted']);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,on_progress,done']);

        $Report = Report::findOrFail($id);
        $Report->update(['status' => $request->status]);

        return response()->json(['msg' => 'Status updated', 'status' => $Report->status]);
    }

    // public function uploadBukti(Request $request, $id)
    // {
    //     $request->validate([
    //         'foto_bukti' => 'required|image|mimes:jpg,png,jpeg|max:2048'
    //     ]);

    //     $Report = Report::findOrFail($id);
    //     $path = $request->file('foto_bukti')->store('bukti');

    //     $Report->update(['foto_bukti' => $path, 'status' => 'done']);

    //     return response()->json(['msg' => 'Bukti uploaded']);
    // }
}
