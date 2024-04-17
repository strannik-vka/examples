<?php

namespace App\Providers;

use App\Helpers\PriceFromUrlHelper;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('path.public', function () {
            return base_path('public_html');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $course_price = PriceFromUrlHelper::getPrice(1);

        view()->share(
            'course_1_price',
            $course_price ? number_format($course_price, 0, ',', ' ') : 0
        );
    }
}
