@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Absences</h1>
    <div class="table table-responsive">
        <table class="table w-50 m-auto">
            <thead>
            <tr>
                <th class="bg-danger text-white text-center font-bold w-25">Absences: {{ $count }}</th>
            </tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Employee</th>
                <th scope="col">Absences</th>
                <th scope="col">Absences Date</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($absences as $absence)
                    <tr>
                        <td scope="row">{{ $absence->id }}</td>
                        <td scope="row">{{ $absence->user->name }}</td>
                        <td scope="row">{{ $absence->absence }}</td>
                        <td scope="row">{{ $absence->absence_date }}</td>
                        <td>
                            <form method="POST" action="{{ route("absences.destroy", $absence->id) }}">
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
