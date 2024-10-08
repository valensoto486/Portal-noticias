<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'notices'; 

    protected $fillable = ['title', 'description', 'content', 'banner_image', 'author'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'notice_id');
    }

    public function show($id)
    {
        $notice = Forum::with('comments.user')->findOrFail($id);
        return view('forum.show', compact('notice'));
    }

}
