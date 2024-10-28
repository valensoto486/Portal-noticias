<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Forum;

class InicioController extends Controller
{
    public function index()
    {
        $query = Forum::query();

        $notices = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('index', compact('notices'));
    }
}