<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
  
    public function testHomePage()
    {
        $response = $this->get('/home');

        $response->assertSeeText("Home page");
    }
    public function testAboutPage(){
        $response = $this->get('/about');
        $response->assertSeeText("About me");
    }
}
