<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    // Funcion para mostrar las noticias con o sin los filtros :)
    public function index(Request $request)
    {
        $query = Forum::query(); // Inicia la consulta para obtener las noticias

        // Filtro por título
        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // Filtro por autor
        if ($request->filled('author')) {
            $query->where('author', 'LIKE', '%' . $request->author . '%');
        }

        // Filtro por categoría
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // paginación después de los filtros
        $notices = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('forum', compact('notices'));
    }


    // Funcion para mostrar una noticia específica
    public function show($id)
    {
        $notice = Forum::findOrFail($id); // Buscar la noticia por su ID
        return view('forum', compact('notice'));
    }
}
