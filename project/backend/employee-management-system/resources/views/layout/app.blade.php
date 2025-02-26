@extends("layout/header")

@section("head")
    <nav class="navbar bg-body-tertiary border-bottom border-secondary-subtle pt-0 pb-0">
        <p class="container-fluid fw-bold text-decoration-underline m-0 bg-primary text-white">{{ Session::get("name") }}</p>
        <div class="container-fluid justify-content-start">
            <h1 class="navbar-brand mb-0 fw-bold">EMS</h1>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
            <div class="links flex-1">
                <a class="text-decoration-none ms-2 text-primary fw-bold" href="{{ route("users.index") }}">Home</a>
                <a class="text-decoration-none ms-2 text-primary fw-bold" href="{{ route("users.create") }}">Add Employee</a>
                <a class="text-decoration-none ms-2 text-primary fw-bold" href="{{ route("checkin.show") }}">check In</a>
                <a class="text-decoration-none ms-2 text-primary fw-bold" href="{{ route("checkout.show") }}">check Out</a>
                @if (Session::has("user_id"))
                    <form method="POST" action="{{ route("users.logout") }}" class="d-inline">
                        @csrf
                        <button class="text-decoration-none ms-2 border-0 bg-transparent text-danger fw-bold p-0">Signout</button>
                    </form>
                @endif
            </div>
        </div>
    </nav>
@endsection
