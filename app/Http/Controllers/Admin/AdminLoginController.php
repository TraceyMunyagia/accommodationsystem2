<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Use the 'admin' guard if applicable
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // Check if the authenticated user is an admin
                return redirect()->route('admin.home');
            }


            return back()->withErrors(['email' => 'Wrong credentials']);

        }

        // Return back with error message

        public function logout()
        {
            // Log out from the 'admin' guard
            Auth::guard('admin')->logout();
    
            // Redirect to the admin login page after logging out
            return redirect()->route('admin.login');
        }
    }

