<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $user = Auth::user();

            // ✅ যদি ইউজার লগইন করা থাকে, শুধু তখন sameDesignationUsers পাঠাও
            if ($user) {
                $sameDesignationUsers = User::where('designation_id', $user->designation_id)
                    ->where('id', '!=', $user->id)
                    ->get();

                $view->with('sameDesignationUsers', $sameDesignationUsers);

                // ✅ Sidebar Chat History (Users you have exchanged messages with)
                $contactIds = \App\Models\Message::where('from_id', $user->id)
                    ->orWhere('to_id', $user->id)
                    ->latest()
                    ->get(['from_id', 'to_id'])
                    ->map(fn($m) => $m->from_id == $user->id ? $m->to_id : $m->from_id)
                    ->unique()
                    ->take(20);

                $sidebarFriends = User::whereIn('id', $contactIds)->get()->map(function ($friend) use ($user) {
                    $lastMsg = \App\Models\Message::where(function ($q) use ($user, $friend) {
                        $q->where('from_id', $user->id)->where('to_id', $friend->id);
                    })->orWhere(function ($q) use ($user, $friend) {
                        $q->where('from_id', $friend->id)->where('to_id', $user->id);
                    })->latest()->first();

                    $friend->last_message = $lastMsg?->body ? \Illuminate\Support\Str::limit($lastMsg->body, 30) : 'Say hi 👋';
                    $friend->last_message_time = $lastMsg?->created_at ? $lastMsg->created_at->diffForHumans(null, true) : '';
                    $friend->avatar_url = $friend->avatar ? asset($friend->avatar) : asset('frontend/assets/images/user/1.jpg');
                    return $friend;
                })->sortByDesc(function($friend) {
                    // Re-sort by latest message time to maintain history order
                    $m = \App\Models\Message::where(function ($q) use ($friend) {
                         $q->where('from_id', Auth::id())->where('to_id', $friend->id);
                    })->orWhere(function ($q) use ($friend) {
                         $q->where('from_id', $friend->id)->where('to_id', Auth::id());
                    })->latest()->first();
                    return $m ? $m->created_at : 0;
                });

                $view->with('sidebarFriends', $sidebarFriends);
            }

            // ✅ $adminPosts — সবসময়ই শেয়ার হবে
            $adminPosts = Post::with([
                'category:id,title',
                'user:id,name,username,avatar,email,phone,password,role,designation_id'
            ])
                ->where('post_type', 'admin')
                ->where('is_featured', true)
                ->orderBy('created_at', 'DESC')
                ->select('id','content','media','slug','user_id','post_category_id','created_at','updated_at')
                ->get();
            $view->with('adminPosts', $adminPosts);

            // ✅ সব সময়ের জন্য partners শেয়ার
            $partners = Partner::with('designation')->get();
            $view->with('globalPartners', $partners);
        });
    }

}
