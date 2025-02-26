@extends("layout/header")

@section("content")
    <div class="form mt-5 mb-5">
        <div class="form p-5 bg-white border-top">
            <form class="login m-auto" method="POST" action="{{ route("user.signin") }}">
                <h1 class="text-center mb-5">Login</h1>
                @if ($errors->any())
                    <div class="errors">
                        @foreach ($errors->all() as $error)
                            <p class='bg-danger p-2 text-white'>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ @old("email") }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
