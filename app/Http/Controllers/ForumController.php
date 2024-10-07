<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    // Método para mostrar las noticias con o sin filtros
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

        // Si no hay filtros aplicados, simplemente retorna todas las noticias
        $notices = $query->get();

        // Retorna la vista con las noticias (filtradas o no)
        return view('forum', compact('notices'));
    }

    // Método para mostrar una noticia específica
    public function show($id)
    {
        $notice = Forum::findOrFail($id); // Buscar la noticia por su ID
        return view('forum', compact('notice'));
    }
}
