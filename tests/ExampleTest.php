<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('videoclub')
             ->dontSee('CasaJuan');
    }


    // public function testClickNext()
    // {
    //     $this->visit('/catalog/show/154')
    //          ->click('Volver al listado')
    //          ->seePageIs('/catalog');
    // }
    
 }
