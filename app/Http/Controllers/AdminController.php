<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Forum;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all(); // Obtener los usuarios
        return view('admin.users', compact('users'));
    }

    public function content()
    {
        $forums = Forum::all(); // Obtener el contenido
        return view('admin.content', compact('forums'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente');
    }

    public function editContent(Forum $forum)
    {
        return view('admin.edit_content', compact('forum'));
    }

    public function deleteContent(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('admin.content')->with('success', 'Contenido eliminado correctamente');
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
