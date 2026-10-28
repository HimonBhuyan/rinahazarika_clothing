<?php

namespace App\Providers;

use App\Services\CartService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' || isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $cartService = app(CartService::class);
            $wishlist = session('assamese_wishlist', []);
            $view->with([
                'globalCartCount' => $cartService->getCount(),
                'globalWishlistCount' => count($wishlist),
            ]);
        });
    }
}
