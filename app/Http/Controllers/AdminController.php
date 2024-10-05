<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\News;

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
}
