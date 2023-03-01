<?php

namespace App\Http\Controllers;

use App\Models\NotificationLog;

class NotificationLogController extends Controller
{
    /**
     * Display a listing of the notification logs (GET /logs )
     */
    public function index()
    {
        return response()->json(['data' => NotificationLog::all()], 200);
    }

}
