<?php

namespace App\Providers;

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
              if (Auth::check()) {
            $designationId = Auth::user()->designation_id;

            $sameDesignationUsers = User::where('designation_id', $designationId)
                                        ->where('id', '!=', Auth::id())
                                        ->get();

            $view->with('sameDesignationUsers', $sameDesignationUsers);
        }
            $partners = Partner::with('designation')->get();
            $view->with('globalPartners', $partners);
            $user = User::where('username', $username)->firstOrFail();
        });
    }
}
