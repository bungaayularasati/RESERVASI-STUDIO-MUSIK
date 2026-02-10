<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withCount(['reservasis as total_pesanan' => function ($query) {
            $query->whereIn('status', ['selesai', 'dibayar']);
        }])->latest()->get();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
     {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
{
    return view('admin.users.edit', compact('user'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'role' => 'required'
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => $request->role
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User berhasil dihapus');
    }
}
