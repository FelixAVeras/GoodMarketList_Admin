<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = auth()->user();
        $role = $user->getRoleNames()->first();

        return view('dashboard.index', compact('user', 'role'));
    }
}
