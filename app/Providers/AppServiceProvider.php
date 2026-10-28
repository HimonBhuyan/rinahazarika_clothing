<?php

namespace App\Providers;

use App\Services\CartService;
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
