<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Forum;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function users()
    {
        $users = User::all(); // Obtener los usuarios
        return view('users', compact('users'));
    }

    public function content()
    {
        $forums = Forum::all(); // Obtener el contenido
        return view('content', compact('forums'));
    }

    public function editUser(User $user)
    {
        return view('edit_user', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Actualizar el usuario
        $user->update($validatedData);

        // Redirigir o regresar una respuesta
        return redirect()->route('admin.users')->with('success', 'Usuario actualizado exitosamente.');
    }


    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente');
    }

    public function editContent(Forum $forum)
    {
        return view('edit_content', compact('forum'));
    }

    public function deleteContent(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('content')->with('success', 'Contenido eliminado correctamente');
    }

    public function updateContent(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $forum->update($request->all());

        return redirect()->route('admin.content')->with('success', 'Contenido actualizado correctamente');
    }


}
