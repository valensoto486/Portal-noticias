<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $fillable = ['user_id', 'type', 'message', 'read'];

    // Relación con el usuario receptor
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

