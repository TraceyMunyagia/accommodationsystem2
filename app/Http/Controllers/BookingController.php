<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookDouble(Hostel $hostel)
    {
        // Check if there are available double rooms
        if ($hostel->available_double_rooms > 0) {
            // Create a booking request (pending approval by admin)
            Booking::create([
                'user_id' => auth::id(),
                'hostel_id' => $hostel->id,
                'room_type' => 'double',
                'status' => 'pending'
            ]);
            
            return redirect()->route('home')->with('success', 'Booking for single room submitted successfully.');


        }

        return redirect()->back()->with('error', 'No double rooms available.');
    }

    public function bookSingle(Hostel $hostel)
    {
        // Check if there are available single rooms
        if ($hostel->available_single_rooms > 0) {
            // Create a booking request (pending approval by admin)
            Booking::create([
                'user_id' => auth::id(),
                'hostel_id' => $hostel->id,
                'room_type' => 'single',
                'status' => 'pending'
            ]);

            return redirect()->route('home')->with('success', 'Booking for single room submitted successfully.');


        }

        return redirect()->back()->with('error', 'No single rooms available.');
    }

}
