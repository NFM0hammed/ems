@extends("layout/app")

@section("content")
    <div class="container">
        <div class="form">
            <h1 class="text-center pt-4 pb-4">Check Out</h1>
            <form class="bg-white row g-3 mt-4 mb-4 p-3 border-top" method="POST" action="{{ route("user.checkout_test") }}">
                @if ($errors->has("id_error"))
                    <p class="bg-danger text-white p-2">{{ $errors->first("id_error") }}</p>
                @endif
                @if ($errors->has("check_out_exists"))
                    <p class="bg-warning text-white p-2">{{ $errors->first("check_out_exists") }}</p>
                @endif
                @csrf
                <div>
                <input type="text" class="form-control" id="inputEmail4" name="id" placeholder="Your id number...">
                </div>
                <div>
                <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </form>
        </div>
    </div>
@endsection
