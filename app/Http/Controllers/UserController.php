<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:superadmin']);
    }

    public function index()
    {
        $users = User::orderBy('role')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = ['student','petugas','admin','superadmin'];
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6|confirmed',
            'role'=>'required|in:student,petugas,admin,superadmin'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success','User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = ['student','petugas','admin','superadmin'];
        return view('users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'role'=>'required|in:student,petugas,admin,superadmin',
            'password'=>'nullable|string|min:6|confirmed'
        ]);

        $data = $request->only('name','email','role');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success','User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User berhasil dihapus.');
    }

    public function show(User $user)
    {
        return "Detail user: $user->name";
    }
        
}
