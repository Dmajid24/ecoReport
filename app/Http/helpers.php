<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('redirectByRole')) {
    function redirectByRole()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
    
        return match ($user->role) {
            'student'    => redirect()->route('reports.index'),
            'admin'      => redirect()->route('categories.index'),
            'petugas'    => redirect('/petugas/reports'),
            'superadmin' => redirect()->route('users.index'),
            default      => redirect()->route('login'),
        };
    }
}
