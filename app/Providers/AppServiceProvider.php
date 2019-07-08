<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\EstadoLuminaria;
use App\Luminaria;
use DB;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        EstadoLuminaria::created(function ($estadoluminaria) {
            if ($estadoluminaria->estado == 0) {
                $fech = $estadoluminaria->fecha;
                $lumid = $estadoluminaria->luminaria_id;

                DB::table('luminarias')
                ->where('id', $lumid)
                ->update(['fecha_baja' => $fech]);

                \Log::info('Baja' . $estadoluminaria);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
