<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return Inertia::render('Dashboard/index');
    }
}
