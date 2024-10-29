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
        if ($request->filled('created_at')) {
            if ($request->created_at == 'Hoy') {
                $query->whereDate('created_at', '=', date('Y-m-d'));
            } elseif ($request->created_at == 'Ultima semana') {
                $query->whereBetween('created_at', [now()->subWeek(), now()]);
            } elseif ($request->created_at == 'Ultimo mes') {
                $query->whereBetween('created_at', [now()->subMonth(), now()]);
            }
        }

        // Paginación después de los filtros
        $notices = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('forum', compact('notices'));
    }


    // Función para mostrar una noticia específica
    public function show($id)
    {
        $notice = Forum::find($id);

        return view('forum', compact('notice'));
    }
}
