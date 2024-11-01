<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'notice_id', 'body', 'is_approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notice()
    {
        return $this->belongsTo(Forum::class, 'notice_id'); // Cambia 'forum_id' por 'notice_id'
    }


}
