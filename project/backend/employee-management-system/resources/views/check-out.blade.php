@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Check Out</h1>
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
                            <form method="POST" action="{{ route("user.checkout", $user->id) }}">
                                @csrf
                                <button class="border-0 bg-danger text-white w-100">Early check out</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
