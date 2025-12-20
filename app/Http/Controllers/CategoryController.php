<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Category index";
    }
    
    public function create()
    {
        return "Category create";
    }
    
    public function store(Request $request)
    {
        return "Category store";
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
