@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-info-subtle">
                <div class="card-header">{{ __('Add Hostel') }}</div>

                <div class="card-body border border-info-subtle">
                    <form method="POST" action="{{ route('admin.hostels.store') }}">
                        @csrf

                        <!-- Hostel Name -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Hostel Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Available Double Rooms -->
                        <div class="row mb-3">
                            <label for="available_double_rooms" class="col-md-4 col-form-label text-md-end">{{ __('Available Double Rooms') }}</label>

                            <div class="col-md-6">
                                <input id="available_double_rooms" type="number" class="form-control @error('available_double_rooms') is-invalid @enderror" name="available_double_rooms" value="{{ old('available_double_rooms') }}" required>

                                @error('available_double_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Available Single Rooms -->
                        <div class="row mb-3">
                            <label for="available_single_rooms" class="col-md-4 col-form-label text-md-end">{{ __('Available Single Rooms') }}</label>

                            <div class="col-md-6">
                                <input id="available_single_rooms" type="number" class="form-control @error('available_single_rooms') is-invalid @enderror" name="available_single_rooms" value="{{ old('available_single_rooms') }}" required>

                                @error('available_single_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Hostel') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
