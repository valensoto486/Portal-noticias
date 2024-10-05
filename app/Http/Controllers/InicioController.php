<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Forum;

class InicioController extends Controller
{
    public function index()
    {
        $notices = Forum::all();
        return view('index', compact('notices'));
    }
}