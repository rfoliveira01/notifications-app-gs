<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessNotificationSubscription;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages (GET /messages )
     */
    public function index()
    {
        return response()->json(Message::all()->sortByDesc('created_at'), 200);
    }

    /**
     * Create a new message (POST)
     */
    public function store(Request $request)
    {
        $message = $request->get("message");

        $category_id = $request->get("category_id");

        $message = new Message([
            'category_id' => $category_id,
            'message' => $message
        ]);

        try {

            $message->save();

            ProcessNotificationSubscription::dispatch($message);

            return response()->json($message, 200);
        } catch (Exception $e) {
            return response()->json(["Could not save the message."], 400);
        }
    }

    /**
     * Retrieves a message object (GET messages/{$id})
     */
    public function show(Message $message)
    {
        return response()->json($message, 200);
    }
}
