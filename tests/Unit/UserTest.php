<?php

namespace Tests\Unit;

use App\Models\SubscriptionCategory;
use App\Models\SubscriptionChannel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can have many subscribed categories
     *
     * @return void
     */
    public function testUserCanHaveManySubscribedCategories()
    {
        $user = User::factory()->create();
        $category1 = SubscriptionCategory::factory()->create();
        $category2 = SubscriptionCategory::factory()->create();

        $user->subscribedCategories()->saveMany([$category1, $category2]);

        $this->assertInstanceOf(SubscriptionCategory::class, $user->subscribedCategories()->first());
        $this->assertInstanceOf(SubscriptionCategory::class, $user->subscribedCategories()->get()[1]);
    }

    /**
     * Test user can have many preferred channels
     *
     * @return void
     */
    public function testUserCanHaveManyPreferredChannels()
    {
        $user = User::factory()->create();
        $channel1 = SubscriptionChannel::factory()->create();
        $channel2 = SubscriptionChannel::factory()->create();

        $user->preferedChannels()->saveMany([$channel1, $channel2]);

        $this->assertInstanceOf(SubscriptionChannel::class, $user->preferedChannels()->first());
        $this->assertInstanceOf(SubscriptionChannel::class, $user->preferedChannels()->get()[1]);
    }
}