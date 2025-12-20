<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
class PetugasController extends Controller
{
    public function index()
    {
        return "Halaman petugas - daftar laporan";
    }

    public function updateStatus($id)
    {
        return "Update status laporan ID: $id";
    }
}
