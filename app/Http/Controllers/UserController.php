<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        $roles = Role::all();
        return view('usuarios.index', compact('usuarios', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function asignarRol(Request $request, User $usuario)
    {
        $request->validate([
            'rol' => 'required|exists:roles,name'
        ]);
        $usuario->syncRoles([$request->rol]);
        return redirect()->route('usuarios.index')->with('success', 'Rol asignado correctamente.');
    }
}
