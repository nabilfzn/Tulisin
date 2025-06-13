<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index() {
        $users = User::all();
        return view('admin.admin', [
            'users' => $users,
    ]);
    }
}
