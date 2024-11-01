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

        Comment::create([
            'user_id' => Auth::id(),
            'notice_id' => $forum->id,
            'body' => $request->body,
            'is_approved' => false, // Por defecto, los comentarios no están aprobados
        ]);

        return redirect()->back()->with('success', 'Comentario pendiente de aprobación.');
    }

    public function index()
    {
        $approvedComments = Comment::where('is_approved', true)->get();
        $pendingComments = Comment::where('is_approved', false)->with('notice')->get(); 
        return view('comments', compact('approvedComments', 'pendingComments'));
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

    // Método para aprobar un comentario
    public function approve(Comment $comment)
    {
        $comment->is_approved = true;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'Comentario aprobado correctamente.');
    }

    // Método para rechazar un comentario
    public function reject(Comment $comment)
    {
        $comment->is_approved = false;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'Comentario rechazado correctamente.');
    }
}
