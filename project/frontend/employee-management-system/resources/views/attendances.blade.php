@extends("layout/app")

@section("content")
    <div class="table table-responsive">
        <h1 class="text-center pt-4 pb-4">Attendances</h1>
        <table class="table w-50 m-auto text-center table-striped border-top">
            <thead>
            <tr>
                <th class="bg-warning text-white text-center font-bold w-25">Delay: {{ $count }}</th>
            </tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Check-in</th>
                <th scope="col">delay</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <th class="pt-5 pb-5" scope="row">{{ $attendance->id }}</th>
                        <td class="pt-5 pb-5">{{ $attendance->check_in}}</td>
                        <td class="pt-5 pb-5">{{ $attendance->delay }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
