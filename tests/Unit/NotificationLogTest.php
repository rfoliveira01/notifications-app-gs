<?php

namespace Tests\Unit;

use App\Models\Message;
use App\Models\NotificationLog;
use App\Models\SubscriptionChannel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use InvalidArgumentException;
use Tests\TestCase;

class NotificationLogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testNotificationBelongsToAnUser()
    {
        $user = User::factory()->create();
        $log = NotificationLog::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $log->user);
        $this->assertEquals($user->id, $log->user->id);
    }

    /** @test */
    public function testNotificationBelongsToAMessage()
    {
        $message = Message::factory()->create();
        $log = NotificationLog::factory()->create(['message_id' => $message->id]);

        $this->assertInstanceOf(Message::class, $log->message);
        $this->assertEquals($message->id, $log->message->id);
    }

    /** @test */
    public function testCanLogANotification()
    {
        $message = Message::factory()->create();
        $user = User::factory()->create();
        $channel = SubscriptionChannel::SUBSCRIPTION_CHANNEL_SMS;

        $log = NotificationLog::logNotification($message->id, $user->id, $channel);

        $this->assertInstanceOf(NotificationLog::class, $log);
        $this->assertEquals($message->id, $log->message_id);
        $this->assertEquals($user->id, $log->user_id);
        $this->assertEquals($channel, $log->channel);
    }

    /** @test */
    public function testThrowsExceptionForInvalidChannel()
    {
        $this->expectException(InvalidArgumentException::class);
        NotificationLog::logNotification(1, 1, 'invalid_channel');
    }


}
