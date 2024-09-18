@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Hostel List') }}</div>

                <div class="card-body">
                    @if($hostels->isEmpty())
                        <p>No hostels available at the moment.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hostel Name</th>
                                    <th>Gender</th>
                                    <th>Available Double Rooms</th>
                                    <th>Available Single Rooms</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hostels as $hostel)
                                    <tr>
                                        <td>{{ $hostel->name }}</td>
                                        <td>{{ ucfirst($hostel->gender) }}</td>
                                        <td>{{ $hostel->available_double_rooms }}</td>
                                        <td>{{ $hostel->available_single_rooms }}</td>
                                        <td>
                                            @if($hostel->available_double_rooms > 0)
                                                <form method="POST" action="{{ route('book.double', $hostel->id) }}" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">Book Double</button>
                                                </form>
                                            @endif

                                            @if($hostel->available_single_rooms > 0)
                                                <form method="POST" action="{{ route('book.single', $hostel->id) }}" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary btn-sm">Book Single</button>
                                                </form>
                                            @endif
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
