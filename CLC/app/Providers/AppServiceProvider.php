<?php

namespace App\Providers;

use App\Models\BlockExpert;
use App\Models\BlockProfessional;
use App\Models\PartnerCategory;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Отправка ссылки для сброса пароля
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $email = $notifiable->getEmailForPasswordReset();
            $user = User::where('email', $email)->first();

            return (new MailMessage)
                ->subject('Восстановление доступа')
                ->markdown('mailing.restore_password', [
                    'user' => $user,
                    'url' => route('password.reset', $token) . '?email=' . $email
                ]);
        });

        View::composer('sections.expert', function ($view) {
            $view->with('experts', BlockExpert::where('published', 1)->orderBy('sort', 'asc')->get());
        });

        View::composer('sections.professional', function ($view) {
            $view->with('professionals', BlockProfessional::where('published', 1)->orderBy('sort', 'asc')->get());
        });

        View::composer('sections.partners', function ($view) {
            $view->with('partnerCategories', PartnerCategory::with([
                'partners' => function ($query) {
                    return $query->where('published', 1);
                }
            ])->where('published', 1)->orderBy('sort', 'asc')->get());
        });
    }
}
