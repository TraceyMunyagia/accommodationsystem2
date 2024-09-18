@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pending Bookings') }}</div>

                <div class="card-body">
                    @if($bookings->isEmpty())
                        <p>No pending bookings.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Hostel</th>
                                    <th>Room Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->hostel->name }}</td>
                                        <td>{{ ucfirst($booking->room_type) }}</td>
                                        <td>{{ ucfirst($booking->status) }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.bookings.approve', $booking->id) }}" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.bookings.reject', $booking->id) }}" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
