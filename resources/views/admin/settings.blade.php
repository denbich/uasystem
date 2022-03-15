@extends('layouts.app')

@section('title')
{{ __('Ustawienia') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex mt-2 align-items-center w-100">
            <a class="mt-2 mx-auto" href="{{ route('a.dashboard') }}">
                <h1>uaSystem</h1>
            </a>
          </div>
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                @include('admin.include.dashboard')
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading p-0 text-muted">
                <span class="docs-normal">Ogólne</span>
            </h6>
              <ul class="navbar-nav">
                @include('admin.include.users')
                @include('admin.include.refugees')
              </ul>

              <hr class="my-3">
              <h6 class="navbar-heading p-0 text-muted">
                <span class="docs-normal">Inne</span>
              </h6>

              <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('a.settings') }}">
                        <i class="fas fa-cog text-primary"></i>
                        <span class="nav-link-text">Ustawienia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-primary"></i>
                        <span class="nav-link-text">Wyloguj się</span>
                    </a>
                </li>

              </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('admin.include.nav')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">{{ __('Ustawienia') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('a.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('Ustawienia') }}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('a.user.create') }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> Nowy użytkownik</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
            <div class="h-100">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Zmiana hasła </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    @if (session('change_password') == true)
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Sukces!</strong> Zamiana hasła zakończyła się pomyślnie!</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('a.settings') }}" method="post">
                        @csrf
                        <div class="row justify-content-center pt-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="oldpassword">Stare hasło</label>
                                    <input class="form-control {{ $errors->has('oldpassword') ? 'is-invalid' : '' }}" type="password" name="oldpassword" id="oldpassword" required>
                                    @error('oldpassword')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="password">Nowe hasło</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                                    @error('password')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="password_confirmation">Powtórz nowe hasło</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <button class="btn btn-primary w-100">Zmień hasło</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>

            @include('footer')
      </div>
  </div>

@endsection
