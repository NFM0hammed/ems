@extends('layout/header')

@section('head')
    <p class="container-fluid fw-bold text-decoration-underline m-0 text-white bg-primary">Hello {{ Session::get("name") }}</p>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container-fluid">
          <h1 class="navbar-brand mb-0 fw-bold">EMS</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold active" aria-current="page" href="{{ route("user.index") }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold" href="{{ route("user.checkin") }}">Check-in</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold" href="{{ route("user.checkout") }}">Check-out</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold" href="{{ route("user.absences") }}">Absences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold" href="{{ route("user.attendances") }}">Attendances</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold" href="{{ route("user.departures") }}">Departures</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-primary fw-bold" href="{{ route("user.edit") }}">Settings</a>
              </li>
              <li class="nav-item">
                @if (Session::has("user_id"))
                  <form method="POST" action="{{ route("user.logout") }}">
                      @csrf
                      <button class="nav-link fw-bold text-danger">Signout</button>
                  </form>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
@endsection
