<?php
namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\Illuminate\Auth\Events\UserLogin;
use App\Listeners\SuccessfulLogin;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Carbon\Carbon;
use DB;
use App\Luminaria;
use App\EstadoLuminaria;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     * 
     */
    protected $listen = [
        'App\Events\SomeEvent'         => [
            'App\Listeners\EventListener',
        ]
    ];
    /**
     * Register any other events for your application.LogSuccessfulLogin
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        $events->listen('auth.login', function ($user, $remember) {

        Auth::user()->last_login_at = new DateTime;
        Auth::user()->save();
    });

    }
}
