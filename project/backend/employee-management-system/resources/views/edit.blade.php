@extends("layout/app")

@section("content")
<div class="container">
    <h1 class="text-center pt-4 pb-4">Edit Employee</h1>
    <form class="bg-white row g-3 mt-4 mb-4 p-3 border-top" method="POST" action="{{ route("users.update", $user->id) }}">
        @csrf
        @method("PUT")
        @if ($errors->any())
           <div class="errors">
               @foreach ($errors->all() as $error)
                   <p class='bg-danger p-2 text-white'>{{ $error }}</p>
               @endforeach
           </div>
        @endif
        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="name" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="col-12">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="col-12">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" value="{{ $user->city }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Job Title</label>
            <input type="text" class="form-control" name="job_title" value="{{ $user->job_title }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Salary</label>
            <input type="text" class="form-control" name="salary" value="{{ $user->salary }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
