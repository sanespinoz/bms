<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modelizer\Selenium\SeleniumTestCase;

class SeleSaiTest extends TestCase
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

  
   
}