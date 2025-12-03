<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show dashboard home
     */
    public function index()
    {
        return view('driver.home');
    }

    /**
     * Show notifications
     */
    public function notifications()
    {
        // TODO: Implement notifications logic
        return view('driver.notification');
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id)
    {
        // TODO: Implement mark as read logic
        return back()->with('success', 'Notification marked as read');
    }
}
