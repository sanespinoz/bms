<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modelizer\Selenium\SeleniumTestCase;

class SeleSaiTest extends SeleniumTestCase
{
	  /*public function setUp() {
       
        $this->setBrowserUrl('http://localhost:8082/bms/public');
    }*/
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        // This is a sample code you can change as per your current scenario
        $this->visit('/')
             ->see('Sistema');

    }

    /**
     * A basic submission test example.
     *
     * @return void
     */
    public function testLoginFormExample()
    {
    	

      /*  $loginInput = [
            'email' => 'san.espinoz@gmail.com',
            'password' => '123456'
        ];
*/
      /*  // Login form test case scenario
        $this->visit('/login')
             ->submitForm('#login', $loginInput)*/
    }
}
