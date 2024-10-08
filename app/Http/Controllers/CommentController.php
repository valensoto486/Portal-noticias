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

    public function index()
    {
        $comments = Comment::with('user')->get(); // O filtra según necesites
        return view('comments', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        return view('edit_comment', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update($request->only('body'));

        return redirect()->route('admin.comments.index')->with('success', 'Comentario actualizado correctamente');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comentario eliminado correctamente');
    }
}

