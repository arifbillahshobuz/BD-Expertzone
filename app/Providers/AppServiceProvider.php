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
            }

            // ✅ $adminPosts — সবসময়ই শেয়ার হবে
            $adminPosts = Post::with([
                'category:id,title',
                'user:id,name,username,avatar,email,phone,password,role,designation_id'
            ])
                ->where('type', 1)
                ->where('is_featured', true)
                ->whereHas('category', function ($query) {
                    $query->whereIn('title', [
                        'Government Jobs',
                        'China Student visa',
                        'China Medical visa'
                    ]);
                })
                ->orderBy('published_at', 'DESC')
                ->select('id','content','media','slug','user_id','post_category_id')
                ->paginate(7);

            $view->with('adminPosts', $adminPosts);

            // ✅ সব সময়ের জন্য partners শেয়ার
            $partners = Partner::with('designation')->get();
            $view->with('globalPartners', $partners);
        });
    }

}
