<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetReturnsAllCategories()
    {
        // Arrange
        $categories = Category::factory()->count(3)->create();

        $this->json('get', 'api/categories')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [

                    '*' => [
                        'id',
                        'name'
                    ]
                ]
            )
            ->assertJson($categories->toArray());
    }

    public function testGetWithIdReturnsACategory()
    {
        // Arrange
        $category = Category::factory()->create();
        $this->json('get', 'api/categories/'.$category->id)
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure(
            [
                'id',
                'name'
            ]
        )
        ->assertJson($category->toArray());
    }
}
