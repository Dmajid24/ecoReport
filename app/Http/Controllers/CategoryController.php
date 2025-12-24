<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('categories.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::create($request->all());

       
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }
    
    public function show(string $id)
    {
        return "Category show: " . $id;
    }
    
    public function edit(string $id)
    {
        return "Category edit: " . $id;
    }
    
    public function update(Request $request, string $id)
    {
        return "Category update: " . $id;
    }
    
    public function destroy(string $id)
    {
        return "Category delete: " . $id;
    }
    
}
