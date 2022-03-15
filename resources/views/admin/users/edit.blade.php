@extends('layouts.app')

@section('title')
{{ __('Edytuj użytkownika')." ".$user->name }}
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
                <li class="nav-item">
                    <a class="nav-link active" href="#users" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="users">
                      <i class="fas fa-user text-primary"></i>
                      <span class="nav-link-text">Użytkownicy</span>
                    </a>
                    <div class="collapse show" id="users" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item active">
                            <a href="{{ route('a.user.list') }}" class="nav-link">
                              <span class="sidenav-normal"> Lista </span>
                            </a>
                          </li>
                        <li class="nav-item">
                          <a href="{{ route('a.user.search') }}" class="nav-link">
                            <span class="sidenav-normal"> Wyszukaj </span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('a.user.create') }}" class="nav-link">
                            <span class="sidenav-normal"> Utwórz </span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>

                @include('admin.include.refugees')
              </ul>

              <hr class="my-3">
              <h6 class="navbar-heading p-0 text-muted">
                <span class="docs-normal">Inne</span>
              </h6>

              <ul class="navbar-nav mb-md-3">
                @include('admin.include.other')
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
              <h6 class="h2 text-white d-inline-block mb-0">{{ $user->name }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('a.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Użytkownicy</li>
                  <li class="breadcrumb-item"><a href="{{ route('a.user.list') }}">#{{ $user->id }}</a></li>
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
        <div class="row">
            <div class="col-lg-3 order-lg-2">
              <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Opcje</h3>
                    <a href="{{ route('a.user.show', [$user->id]) }}" class="btn btn-primary w-100 my-2 text-white">Wróć</a>
                    <hr class="my-2">
                </div>
              </div>
            </div>
            <div class="col-lg-9 h-100 order-lg-1">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Informacje o użytkowniku </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    @if (session('edit_user') == true)
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Sukces!</strong> Edytowanie danych użytkownika zakończyło się pomyślnie!</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ route('a.user.update', [$user->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row pt-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="name">Nazwa użytkownika</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="name" id="name" value="{{ $user->name }}" required>
                                    @error('name')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="firstname">Imię</label>
                                    <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" required>
                                    @error('firstname')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="firstname">Zresetuj do standardowego hasła</label><br>
                                    @if (Auth::user()->name == 'admin1')
                                    <label class="custom-toggle">
                                        <input type="checkbox" name="password">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="Nie" data-label-on="Tak"></span>
                                      </label>
                                    @else
                                    <p class="text-danger">Ta opcja jest dostępna tylko dla admistratora głównego</p>
                                    @endif
                                    @error('email')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="firstname">Adres email</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" maxlength="255" type="email" name="email" id="email" value="{{ $user->email }}" required>
                                    @error('email')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="lastname">Nazwisko</label>
                                    <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" required>
                                    @error('lastname')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="telephone">Numer telefonu</label>
                                    <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" maxlength="255" type="tel" name="telephone" id="telephone" value="{{ $user->telephone }}" required>
                                    @error('telephone')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <button class="btn btn-success w-100">Zapisz zmiany</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

            @include('footer')
      </div>
  </div>

@endsection
