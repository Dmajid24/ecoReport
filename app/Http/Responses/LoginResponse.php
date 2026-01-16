<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $role = auth()->user()->role;

        switch ($role) {
            case 'superadmin':
                return redirect('/users');
            case 'admin':
                return redirect('/categories');
            case 'petugas':
                return redirect('/petugas/reports');
            case 'student':
            default:
                return redirect('/reports');
        }
    }
}
