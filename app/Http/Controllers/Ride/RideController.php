<?php

namespace App\Http\Controllers\Ride;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RideController extends Controller
{
    //
    public function index()
    {
        return view('driver.activeride');
    }
    public function myride()
    {
        return view('driver.myrides');
    }
    public function setting()
    {
        return view('driver.settings');
    }
}
