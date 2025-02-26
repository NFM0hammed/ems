@extends("layout/app")

@section("content")
    <h1 class="text-center pt-4 pb-4">Departures</h1>
    <div class="table table-responsive">
        <table class="table w-50 m-auto">
            <thead>
            <tr>
                <th class="bg-warning text-white text-center font-bold w-25">Departures: {{ $count }}</th>
            </tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Employee</th>
                <th scope="col">Departures Date</th>
                <th scope="col">Early Check Out</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($departures as $departure)
                    <tr>
                        <td scope="row">{{ $departure->id }}</td>
                        <td scope="row">{{ $departure->user->name }}</td>
                        <td scope="row">{{ $departure->check_out }}</td>
                        <td scope="row">{{ $departure->early_check_out }}</td>
                        <td>
                            <form method="POST" action="{{ route("departures.destroy", $departure->id) }}">
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
