<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/api/posts');
        $this->assertEquals(201, $response->status());

    }

    public function testStore()
    {
        $response = $this->post('/api/posts' , [
            'name' => 'test',
            'body' => 'test',
            'image_main' => 'test',
            'price' => '123'
        ]);
        $this->assertEquals(true, $response->status());

    }

    public function testStoreFailedName()
    {
        $response = $this->post('/api/posts' , [
            'name' => '',
            'body' => 'test',
            'image_main' => 'test',
            'price' => '123'
        ]);
        $this->assertEquals(400, $response->status());
    }

    public function testShow(){
        $response = $this->get('/api/posts/5');
        $this->assertEquals(200, $response->status());
    }

    public function testShowNotFound(){
        $response = $this->get('/api/posts/999');
        $this->assertEquals(404, $response->status());
    }
}
