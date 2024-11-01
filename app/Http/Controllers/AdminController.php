<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Comment; // Importar el modelo Comment
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pendingCommentsCount = Comment::where('is_approved', false)->count();
        // Devuelve la vista del dashboard con la variable
        return view('dashboard', compact('pendingCommentsCount'));

        if ($user->hasRole('editor')) {
            // Si el usuario es un editor, redirigir solo a la gestión de contenido
            return redirect()->route('admin.content');
        }
    }

    public function dashboard()
    {
        $pendingCommentsCount = Comment::where('is_approved', false)->count();
        
        // Devuelve la vista del dashboard con la variable
        return view('dashboard', compact('pendingCommentsCount'));
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
        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente');
    }

    public function editContent(Forum $forum)
    {
        return view('edit_content', compact('forum'));
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

    // Método para aprobar un comentario
    public function approveComment(Comment $comment)
    {
        $comment->is_approved = true;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'Comentario aprobado correctamente.');
    }

    // Método para rechazar un comentario
    public function rejectComment(Comment $comment)
    {
        $comment->is_approved = false;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'Comentario rechazado correctamente.');
    }

    public function commentCount()
    {
        return $this->dashboard();
    }
}
