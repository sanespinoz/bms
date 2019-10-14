<?php

require_once __DIR__.'/../vendor/autoload.php';
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
public function testUserAuthentication()
{

     $this->visit('//#$/login') 
          ->see('INICIAR SESIÓN')
          ->type('email','/san\.espinoz/@$/gmail\.com/')
          ->type('password','admin123')
          ->press('Ingresar')
          ->see('Bienvenido');
}



}
