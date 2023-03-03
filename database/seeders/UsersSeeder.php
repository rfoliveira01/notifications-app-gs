<?php

namespace Database\Seeders;

use App\Models\SubscriptionChannel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Markus Antonopoulos',
                    'email' => 'markus@antono.poulos',
                    'phone_number' => '+2383682968'
                ],
                [
                    'id' => 2,
                    'name' => 'Louis Bonaparte',
                    'email' => 'louis@bona.parte',
                    'phone_number' => '+441632960287'
                ],
                [
                    'id' => 3,
                    'name' => 'Wiktor Hayes',
                    'email' => 'wiktor.hayes@gmail.com',
                    'phone_number' => '+441632960228'
                ],
            ]
        );

        DB::table('subscription_categories')->insert(
            [
                [
                    'user_id' => 1,
                    'category_id' => 1,
                ],
                [
                    'user_id' => 2,
                    'category_id' => 2,
                ],
                [
                    'user_id' => 3,
                    'category_id' => 3,
                ],
                [
                    'user_id' => 3,
                    'category_id' => 2,
                ],
                [
                    'user_id' => 3,
                    'category_id' => 1,
                ]
            ]
        );
        DB::table('subscription_channels')->insert(
            [
                [
                    'user_id' => 1,
                    'channel' => SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL,
                ],
                [
                    'user_id' => 2,
                    'channel' => SubscriptionChannel::SUBSCRIPTION_CHANNEL_SMS,
                ],
                [
                    'user_id' => 3,
                    'channel' => SubscriptionChannel::SUBSCRIPTION_CHANNEL_PUSH_NOTIFICATION,
                ],
                [
                    'user_id' => 3,
                    'channel' => SubscriptionChannel::SUBSCRIPTION_CHANNEL_EMAIL,
                ]
            ]
        );
    }
}
