<?php

namespace App\Providers;

use App\Models\Izin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Data untuk notifikasi cuti
            $izinNotifications = Izin::where('status', 'Menunggu')->get();

            $view->with([
                'izinNotifications' => $izinNotifications,
            ]);
        });
    }
}
