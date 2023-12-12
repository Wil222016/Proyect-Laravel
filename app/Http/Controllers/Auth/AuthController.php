<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Obtiene el ID del usuario autenticado
            $userId = auth()->user()->id;
        } else {
            // Si no está autenticado, asigna null
            $userId = null;
        }

        // Retorna la vista con el valor de $userId
        return view('auth.login', compact('userId'));
    }



    // Método para manejar el inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'El campo Email es obligatorio.',
            'email.email' => 'El formato del email es inválido.',
            'password.required' => 'El campo Contraseña es obligatorio.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'email' => ['Estas credenciales no coinciden con nuestros registros.'],
        ]);
    }

    // Método para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Método para manejar el registro
    // Método para manejar el registro
    // Método para manejar el registro
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:50',
            'ci' => 'required|string|max:15|unique:people,ci',
            'email' => 'required|email|unique:people,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|integer',
            'status' => 'required|string|max:1',
        ], [
            'full_name.required' => 'El campo Nombre completo es obligatorio.',
            'ci.required' => 'El campo CI es obligatorio.',
            'ci.max' => 'El campo CI no puede tener más de 15 caracteres.',
            'ci.unique' => 'El CI ya está en uso.',
            'email.required' => 'El campo Email es obligatorio.',
            'email.unique' => 'El email ya está en uso.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'phone.required' => 'El campo Teléfono es obligatorio.',
            'phone.integer' => 'El teléfono debe ser un número entero.',
            'status.required' => 'El campo Estado es obligatorio.',
            'status.max' => 'El campo Estado no puede tener más de 1 caracter.',
        ]);

        $user = Person::create([
            'full_name' => $request->full_name,
            'ci' => $request->ci,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        Auth::login($user);

        return redirect('/');
    }



    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
