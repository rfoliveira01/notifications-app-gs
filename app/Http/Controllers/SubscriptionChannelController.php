<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionChannel;
use Illuminate\Http\Request;

class SubscriptionChannelController extends Controller
{
    /**
     * Retrieves the channel list 
     */
    public function index()
    {
        return response()->json(['data' => SubscriptionChannel::SUBSCRIPTION_CHANNELS], 200);
    }
}
