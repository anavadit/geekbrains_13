<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\NewsFactory;

class NewsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function testNewsAvailable()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function testNewsAdminAvailable()
    {
        $response = $this->get(route('admin.news.index'));
        $response->assertStatus(200);
    }

    public function testNewsCreateAdminAvailable()
    {
        $response = $this->get(route('admin.news.create'));
        $response->assertStatus(200);
    }

    public function testNewsAdminCreated() 
    {
        $category = Category::factory()->create();
        $responseData = News::factory()->definition();
        $responseData = $responseData + ['category_id' => $category->id];

        // $responseData = [
        //     'title' => 'Some title',
        //     'author' => 'Admin',
        //     'status' => 'DRAFT',
        //     'description' => 'Some text'
        // ];
        $response = $this->post(route('admin.news.store'), $responseData);

        // $response->assertJson($responseData);
        $response->assertStatus(301);
    }

    public function testNewsShow()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1,10)]));
        $response->assertStatus(200);
    }
}
 