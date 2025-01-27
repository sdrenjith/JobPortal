<!-- resources/views/theme/account-edit.blade.php -->

@extends('theme.account-profile')

@section('content')
<div class="col-lg-9">
    <h1 class="h2 pb-2 pb-lg-3">Edit Profile</h1>

    <form action="{{ route('user.modify', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Add form fields for each fillable attribute -->
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Profile Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if($user->photo)
                <img src="{{ Storage::url($user->photo) }}" alt="Profile Photo" class="img-thumbnail mt-2" width="100">
            @endif
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection