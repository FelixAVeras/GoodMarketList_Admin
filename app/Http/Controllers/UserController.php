<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Market;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('market')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $markets = Market::all();
        $roles = Role::pluck('name','name')->all();

        return view('users.create', compact('markets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'market_id' => 'nullable|exists:markets,id',
            'roles' => 'required'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'market_id' => $request->market_id,
        ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id) {
        $user = User::find($id);

        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        $markets = Market::all();
        return view('users.edit', compact('user', 'markets'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'market_id' => 'nullable|exists:markets,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'market_id' => $request->market_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
