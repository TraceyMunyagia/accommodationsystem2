<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use Illuminate\Support\Facades\Auth;

class HostelController extends Controller
{
    public function create()
    {
        return view('admin.add-hostel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'available_double_rooms' => 'required|integer|min:0',
            'available_single_rooms' => 'required|integer|min:0',
        ]);

        Hostel::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Hostel added successfully!');
    }

    public function index()
    {
        $user = Auth::user();

        // Retrieve hostels based on user's gender
        if ($user->gender === 'Female') {
            $hostels = Hostel::where('gender', 'Female')->get();
        } else {
            // Adjust this condition if you want to show hostels for other genders as well
            $hostels = Hostel::where('gender', 'Male')->get();
        }
        // Retrieve all hostels from the database

        // Pass the hostels to the view
        return view('hostels.index', compact('hostels'));
    }

}
