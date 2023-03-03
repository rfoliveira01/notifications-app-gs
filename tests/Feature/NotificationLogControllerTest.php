<?php

namespace Tests\Feature;

use App\Models\NotificationLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationLogControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_json_response_containing_notification_logs()
    {
        // Arrange
        NotificationLog::factory()->count(3)->create();

        // Act
        $response = $this->get(route('logs.index'));

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'message_id',
                'user_id',
                'channel',
                'created_at',
            ]
        ]);
    }
}
