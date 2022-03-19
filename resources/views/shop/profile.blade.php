@extends('layouts.app')

@section('title')
{{ __('Profil') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header d-flex mt-2 align-items-center w-100">
        <a class="mt-2 mx-auto" href="{{ route('s.dashboard') }}">
            <h1><i><img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Lesser_Coat_of_Arms_of_Ukraine.svg" style="max-height: 50px;"></i> uaSystem</h1>
        </a>
      </div>
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @include('shop.include.dashboard')
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Ogólne</span>
        </h6>
          <ul class="navbar-nav">
            @include('shop.include.refugees')
          </ul>

          <hr class="my-3">
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Inne</span>
          </h6>

          <ul class="navbar-nav mb-md-3">
            @include('shop.include.other')
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('shop.include.nav')

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Profil</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="{{ route('s.ukrainian.create') }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> Nowy uchodźca</a>
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
                    <h3 class="mb-0">Profil użytkownika </h3>
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
                  <form action="{{ route('s.profile') }}" method="post">
                      @csrf
                      <div class="row pt-2">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="required" for="name">Nazwa użytkownika</label>
                                  <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
                                  @error('name')
                                      <span class="text-danger small" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="required" for="firstname">Imię</label>
                                  <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="firstname" id="firstname" value="{{ Auth::user()->firstname }}" required>
                                  @error('firstname')
                                      <span class="text-danger small" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <a href="{{ route('s.settings') }}" class="btn btn-primary w-100">Zamień hasło</a>
                              </div>

                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="required" for="firstname">Adres email</label>
                                  <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" maxlength="255" type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                                  @error('email')
                                      <span class="text-danger small" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="required" for="lastname">Nazwisko</label>
                                  <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="lastname" id="lastname" value="{{ Auth::user()->lastname }}" required>
                                  @error('lastname')
                                      <span class="text-danger small" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="required" for="telephone">Numer telefonu</label>
                                  <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" maxlength="255" type="tel" name="telephone" id="telephone" value="{{ Auth::user()->telephone }}" required>
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

      @include('footer')
    </div>
  </div>

@endsection


