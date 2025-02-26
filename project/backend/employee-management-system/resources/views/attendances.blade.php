@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Attendances</h1>
    <div class="table table-responsive">
        <table class="table w-50 m-auto">
            <thead>
            <tr>
                <th class="bg-warning text-white text-center font-bold w-25">Attendances: {{ $count }}</th>
            </tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Employee</th>
                <th scope="col">Attendance Date</th>
                <th scope="col">Delay</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td scope="row">{{ $attendance->id }}</td>
                        <td scope="row">{{ $attendance->user->name }}</td>
                        <td scope="row">{{ $attendance->check_in }}</td>
                        <td scope="row">{{ $attendance->delay }}</td>
                        <td>
                            <form method="POST" action="{{ route("attendances.destroy",  $attendance->id) }}">
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
