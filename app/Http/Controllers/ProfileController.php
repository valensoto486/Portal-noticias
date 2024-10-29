<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Editar el usuario
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Actualizar la información de usuario
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Manejar la subida de imagen si se proporciona
        if ($request->hasFile('image')) {
            // Lógica para guardar la imagen
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Eliminar la cuenta
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Cambiar contraseña 
     */
    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = $request->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'password-updated');
    }


}
