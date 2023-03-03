<?php

namespace Tests\Feature;

use App\Jobs\ProcessNotificationSubscription;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexReturnsAllMessagesSortedByCreatedAt()
    {
        // Arrange
        $messages = [
            Message::factory()->create([
                'created_at' => now()->subDay(),
            ]),
            Message::factory()->create([
                'created_at' => now(),
            ]),
        ];

        // Act
        $response = $this->get(route('messages.index'));

        // Assert
        $response->assertOk();
        $response->assertJsonCount(count($messages));
        $response->assertJsonFragment([
            'id' => $messages[1]->id, // last created message should be first
        ]);
    }

    public function testStoreCreatesNewMessageAndQueuesNotificationProcess()
    {
        // Arrange
        $category = Category::factory()->create();

        $data = [
            'message' => 'Test message',
            'category_id' => $category->id,
        ];

        // Act
        Queue::fake();
        
        $response = $this->json('post', 'api/messages', $data);

        // Assert
        $response->assertOk();
        $response->assertJsonFragment([
            'message' => $data['message'],
            'category_id' => $data['category_id'],
        ]);
        $this->assertDatabaseHas('messages', [
            'message' => $data['message'],
            'category_id' => $data['category_id'],
        ]);

        Queue::assertPushed(ProcessNotificationSubscription::class, function ($job) use ($data) {
            return $job->getMessage()->message === $data['message'] &&
                $job->getMessage()->category_id === $data['category_id'];
        });
    }

    public function testStoreReturnsErrorWhenMessageNotSaved()
    {
        // Arrange
        $data = [
            'message' => 'Test message',
            // missing category_id
        ];

        // Act
        $response = $this->post(route('messages.store'), $data);

        // Assert
        $response->assertStatus(400);
        $response->assertJsonFragment(["Could not save the message."]);
        $this->assertDatabaseMissing('messages', [
            'message' => $data['message'],
        ]);
    }

    public function testShowReturnsMessageObject()
    {
        // Arrange
        $message = Message::factory()->create();

        // Act
        $response = $this->get(route('messages.show', $message));

        // Assert
        $response->assertOk();
        $response->assertJsonFragment([
            'id' => $message->id,
            'message' => $message->message,
            'category_id' => $message->category_id,
        ]);
    }
}
