<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $adminUsers;

    public function __construct()
    {
        // Inicializa la propiedad en el constructor
        $this->adminUsers = User::where('role', 'admin')->get();
    }

    public function sendNotification($userId, $type, $message)
    {
        foreach ($this->adminUsers as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'type' => $type,
                'message' => $message,
            ]);
        }
    }

    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('notifications', compact('notifications'));
    }

}
