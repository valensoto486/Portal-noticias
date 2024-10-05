<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    public function index()
    {

        $notices = Forum::all();
        return view('forum', compact('notices'));
    }

    public function show($id)
    {
        $notice = Forum::findOrFail($id);
        return view('forum', compact('notice'));
    }
}