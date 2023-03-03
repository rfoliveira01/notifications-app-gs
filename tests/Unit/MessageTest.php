<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the `category` method.
     *
     * @return void
     */
    public function testCategory()
    {
        $category = Category::factory()->create();
        $message = Message::factory()->create([
            'category_id' => $category->id,
        ]);

        $this->assertInstanceOf(Category::class, $message->category);
        $this->assertEquals($category->id, $message->category->id);
    }

    /**
     * Test that the `updated_at` attribute is hidden from serialization.
     *
     * @return void
     */
    public function testHiddenAttributes()
    {
        $message = Message::factory()->create();

        $this->assertArrayNotHasKey('updated_at', $message->toArray());
    }
}
