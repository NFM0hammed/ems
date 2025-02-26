@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Employees Management</h1>
    <div class="table table-responsive">
        @if ($errors->has("check_in_problem"))
            <p class="bg-danger text-white p-2 container">{{ $errors->first("check_in_problem") }}</p>
        @endif
        @if ($errors->has("Check_out_problem"))
            <p class="bg-danger text-white p-2 container">{{ $errors->first("Check_out_problem") }}</p>
        @endif
        <table class="table w-50 m-auto text-center table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Job title</th>
                <th scope="col">Salary</th>
                <th scope="col">Date Of Joining</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th class="pt-5 pb-5" scope="row">{{ $user->id }}</th>
                        <td class="pt-5 pb-5">{{ $user->name }}</td>
                        <td class="pt-5 pb-5">{{ $user->email}}</td>
                        <td class="pt-5 pb-5">{{ $user->city}}</td>
                        <td class="pt-5 pb-5">{{ $user->job_title}}</td>
                        <td class="pt-5 pb-5">{{ $user->salary}}</td>
                        <td class="pt-5 pb-5">{{ $user->date_of_joining}}</td>
                        <td class="d-flex flex-column ">
                            <a class="text-decoration-none bg-primary text-white mb-2 p-1" href="{{ route("users.absences", $user->id) }}">
                                Absences
                            </a>
                            <a class="text-decoration-none bg-primary text-white mb-2 p-1" href="{{ route("users.attendances", $user->id) }}">
                                Attendances
                            </a>
                            <a class="text-decoration-none bg-primary text-white mb-2 p-1" href="{{ route("users.departures", $user->id) }}">
                                Departures
                            </a>
                            <a class="text-decoration-none bg-warning text-white mb-2 p-1" href="{{ route("users.edit", $user->id) }}">
                                Edit
                            </a>
                            <form method="POST" action="{{ route("users.destroy", $user->id) }}">
                                @csrf
                                @method("DELETE")
                                <button class="border-0 bg-danger text-white w-100">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
