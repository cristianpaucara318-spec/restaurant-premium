<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->rol === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', '¡Bienvenido administrador!');
            }

            return redirect()->route('inicio')
                ->with('success', '¡Bienvenido nuevamente!');
        }

        return back()->withErrors([
            'email' => 'El correo o la contraseña son incorrectos.'
        ])->onlyInput('email');
    }
}
