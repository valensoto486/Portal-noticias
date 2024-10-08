<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        // Depurar los datos recibidos
        //dd($request->all());

        Comment::create([
            'user_id' => Auth::id(),
            'notice_id' => $forum->id,
            'body' => $request->body,
        ]);

        return redirect()->route('forum.show', $forum->id)->with('success', 'Comentario añadido correctamente');
    }
}

