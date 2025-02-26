@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Check In</h1>
    <div class="table table-responsive">
        <table class="table w-50 m-auto">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Employee</th>
                <th scope="col">Email</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route("user.absence", $user->id) }}">
                                @csrf
                                <button class="border-0 bg-danger text-white w-100">Absence</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
