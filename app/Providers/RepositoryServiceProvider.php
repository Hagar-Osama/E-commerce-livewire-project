<?php

namespace App\Providers;

use App\Http\Interfaces\AdminInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\ColorInterface;
use App\Http\Interfaces\EndUser\CartInterface;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Interfaces\EndUser\OrderInterface;
use App\Http\Interfaces\EndUser\ProfileInterface;
use App\Http\Interfaces\EndUser\WishlistInterface;
use App\Http\Interfaces\OrdersInterface;
use App\Http\Interfaces\ProductInterface;
use App\Http\Interfaces\SettingsInterface;
use App\Http\Interfaces\SliderInterface;
use App\Http\Interfaces\UsersInterface;
use App\Http\Repositories\AdminRepository;
use App\Http\Repositories\AuthRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ColorRepository;
use App\Http\Repositories\EndUser\CartRepository;
use App\Http\Repositories\EndUser\HomeRepository;
use App\Http\Repositories\EndUser\OrderRepository;
use App\Http\Repositories\EndUser\ProfileRepository;
use App\Http\Repositories\EndUser\WishlistRepository;
use App\Http\Repositories\OrdersRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\SettingsRepository;
use App\Http\Repositories\SliderRepository;
use App\Http\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(ColorInterface::class, ColorRepository::class);
        $this->app->bind(SliderInterface::class, SliderRepository::class);
        $this->app->bind(HomeInterface::class, HomeRepository::class);
        $this->app->bind(WishlistInterface::class, WishlistRepository::class);
        $this->app->bind(CartInterface::class, CartRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(OrdersInterface::class, OrdersRepository::class);
        $this->app->bind(SettingsInterface::class, SettingsRepository::class);
        $this->app->bind(UsersInterface::class, UsersRepository::class);
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(ProfileInterface::class, ProfileRepository::class);








    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
