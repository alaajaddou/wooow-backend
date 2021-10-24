<?php
namespace App\Providers;

use Darryldecode\Cart\Cart;
use DBStorage;
use Illuminate\Support\ServiceProvider;

class WishListProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wishlist', function($app)
        {
            $storage = new DBStorage();
            $events = $app['events'];
            $instanceName = 'wishlist';
            $session_key = '88uuiioo99888';
            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_wishlist')
            );
        });
    }
}
