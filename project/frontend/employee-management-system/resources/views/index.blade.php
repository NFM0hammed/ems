@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Profile</h1>
    <div class="table table-responsive">
        <table class="table w-50 m-auto text-center table-striped border-top">
            @if ($errors->has("ckeck_in_problem"))
                <p class="bg-danger text-white p-2 container">{{ $errors->first("ckeck_in_problem") }}</p>
            @endif
            @if ($errors->has("ckeck_out_problem"))
                <p class="bg-danger text-white p-2 container">{{ $errors->first("ckeck_out_problem") }}</p>
            @endif
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Job title</th>
                <th scope="col">Salary</th>
                <th scope="col">Date Of Joining</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="pt-5 pb-5" scope="row">{{ $user->id }}</th>
                    <td class="pt-5 pb-5">{{ $user->name }}</td>
                    <td class="pt-5 pb-5">{{ $user->email}}</td>
                    <td class="pt-5 pb-5">{{ $user->city}}</td>
                    <td class="pt-5 pb-5">{{ $user->job_title}}</td>
                    <td class="pt-5 pb-5">{{ $user->salary}}</td>
                    <td class="pt-5 pb-5">{{ $user->date_of_joining}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
