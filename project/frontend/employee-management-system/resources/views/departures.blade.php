@extends("layout/app")

@section("content")
    <div class="table">
        <h1 class="text-center pt-4 pb-4">Departures</h1>
        <table class="table w-50 m-auto text-center table-striped border-top">
            <thead>
            <tr>
                <th class="bg-warning text-white text-center font-bold w-25">Early check out: {{ $count }}</th>
            </tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Check-out</th>
                <th scope="col">Early-check-out</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($departures as $departure)
                    <tr>
                        <th class="pt-5 pb-5" scope="row">{{ $departure->id }}</th>
                        <td class="pt-5 pb-5">{{ $departure->check_out}}</td>
                        <td class="pt-5 pb-5">{{ $departure->early_check_out }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
