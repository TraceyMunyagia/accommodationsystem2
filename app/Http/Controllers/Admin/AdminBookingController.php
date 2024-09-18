<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hostel;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        // Get all pending bookings
        $bookings = Booking::where('status', 'pending')->get();
        
        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve(Booking $booking)
    {
        $hostel = $booking->hostel;

        if ($booking->room_type === 'double' && $hostel->available_double_rooms > 0) {
            $hostel->decrement('available_double_rooms');
        } elseif ($booking->room_type === 'single' && $hostel->available_single_rooms > 0) {
            $hostel->decrement('available_single_rooms');
        } else {
            return redirect()->back()->with('error', 'Not enough rooms available to approve this booking.');
        }

        $booking->update(['status' => 'approved']);

        return redirect()->route('admin.dashboard')->with('success', 'Booking approved successfully and room count updated.');

    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);

        return redirect()->route('admin.dashboard')->with('success', 'Booking rejected successfully.');

    }
}
