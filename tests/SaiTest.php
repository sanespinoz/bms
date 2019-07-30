<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SaiTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function loginWithWrongCredentials()
    {       
        $this->visit('/#login')
        ->see('Correo Electrónico')
        ->type('nopas','password')
        ->check('remember')
        ->press('Ingresar')
        ->see('Estas credenciales no se corresponden con sus registros');

    }


}
