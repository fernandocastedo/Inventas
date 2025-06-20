<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de tener un modelo User
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:User,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::create([
            'tenant_id' => 1, // O lógica para asignar tenant
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'status' => 'active',
        ]);
        // Autologin tras registro
        auth()->login($user);
        return redirect()->route('dashboard')->with('success', '¡Cuenta creada exitosamente!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    // Listar usuarios del tenant actual
    public function index()
    {
        $tenantId = auth()->user()->tenant_id;
        $users = User::forTenant($tenantId)->get();
        return view('users.index', compact('users'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('users.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:User,email',
            'password' => 'required|min:6',
            'role' => 'required',
            'status' => 'required',
        ]);
        User::create([
            'tenant_id' => auth()->user()->tenant_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $tenantId = auth()->user()->tenant_id;
        $user = User::forTenant($tenantId)->findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $tenantId = auth()->user()->tenant_id;
        $user = User::forTenant($tenantId)->findOrFail($id);
        $request->validate([
            'email' => 'required|email|unique:User,email,' . $user->user_id . ',user_id',
            'role' => 'required',
            'status' => 'required',
        ]);
        $data = [
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $tenantId = auth()->user()->tenant_id;
        $user = User::forTenant($tenantId)->findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
}