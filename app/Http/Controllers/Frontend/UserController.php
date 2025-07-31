<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display all users except the current user
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())
            ->with([
                'chats' => function ($query) {
                    $query->orderBy('updated_at', 'desc');
                }
            ])
            ->orderBy('name')
            ->get()
            ->map(function ($user) {
                $user->is_online = $user->isOnline();
                $user->last_interaction = $user->chats->first()?->updated_at;
                return $user;
            })
            ->sortByDesc('last_interaction')
            ->values();

        return response()->json($users);
    }
}
