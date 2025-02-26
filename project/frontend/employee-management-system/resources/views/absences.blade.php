@extends("layout/app")

@section("content")
    <div class="table table-responsive">
        <h1 class="text-center pt-4 pb-4">Absences</h1>
        <table class="table w-50 m-auto text-center table-striped border-top">
            <thead>
            <tr>
                <th class="bg-danger text-white text-center font-bold w-25">Absences: {{ $count }}</th>
            </tr>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Absences</th>
                <th scope="col">absence_date</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($absences as $absence)
                    <tr>
                        <th class="pt-5 pb-5" scope="row">{{ $absence->id }}</th>
                        <td class="pt-5 pb-5">{{ $absence->absence}}</td>
                        <td class="pt-5 pb-5">{{ $absence->absence_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
