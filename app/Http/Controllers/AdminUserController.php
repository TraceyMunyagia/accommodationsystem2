<?php

namespace App\Http\Controllers;

use App\Models\User; // Add the User model
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Fetch and display all users
    public function index()
    {
        $users = User::select('admission_number', 'name', 'phone_number', 'gender', 'email')->get(); // Exclude password
        return view('admin.users.index', compact('users'));
    }
}
