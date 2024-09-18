@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Students') }}</div>

                <div class="card-body">
                    @if($users->isEmpty())
                        <p>No users available at the moment.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Admission Number</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                    <th>Email Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->admission_number }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ ucfirst($user->gender) }}</td>
                                        <td>{{ $user->email }}</td>
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
