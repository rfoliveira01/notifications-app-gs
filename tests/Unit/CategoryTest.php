<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\SubscriptionChannel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the `getSubscribedUserIdsAndChannelsByCategoryId` method.
     *
     * @return void
     */
    public function testGetSubscribedUserIdsAndChannelsByCategoryId()
    {
        $category = Category::factory()->create();

        $user1 = DB::table('users')->insertGetId([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'phone_number' => '5435243254',
        ]);

        $user2 = DB::table('users')->insertGetId([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'phone_number' => '5435243254',
        ]);

        DB::table('subscription_categories')->insert([
            'user_id' => $user1,
            'category_id' => $category->id,
        ]);

        DB::table('subscription_categories')->insert([
            'user_id' => $user2,
            'category_id' => $category->id,
        ]);

        DB::table('subscription_channels')->insert([
            'user_id' => $user1,
            'channel' => SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL,
        ]);

        DB::table('subscription_channels')->insert([
            'user_id' => $user2,
            'channel' => SubscriptionChannel::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION,
        ]);

        $subscribers = Category::getSubscribedUserIdsAndChannelsByCategoryId($category->id);

        $this->assertCount(2, $subscribers);
        $this->assertEquals($user1, $subscribers[0]->user_id);
        $this->assertEquals(SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL, $subscribers[0]->channel);
        $this->assertEquals($user2, $subscribers[1]->user_id);
        $this->assertEquals(SubscriptionChannel::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION, $subscribers[1]->channel);
    }
}