@extends('layouts.app')

@section('title')
{{ __('Utwórz użytownika') }}
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
                        <li class="nav-item">
                            <a href="{{ route('a.user.list') }}" class="nav-link">
                              <span class="sidenav-normal"> Lista </span>
                            </a>
                          </li>
                        <li class="nav-item">
                          <a href="{{ route('a.user.search') }}" class="nav-link">
                            <span class="sidenav-normal"> Wyszukaj </span>
                          </a>
                        </li>
                        <li class="nav-item active">
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
              <h6 class="h2 text-white d-inline-block mb-0">Utwórz użytkownika</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('a.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Użytkownicy</li>
                  <li class="breadcrumb-item"><a href="{{ route('a.user.create') }}">utwórz</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Utwórz użytkownika </h3>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    @if (session('create_user') == true)
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Sukces!</strong> Użytkownik został utworzony pomyślnie!</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <form action="{{ route('a.user.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="required" for="name">Nazwa użytkownika</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                @error('name')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p id="counter_name" class="text-sm">0 / 255 znaków</p>
                            </div>

                            <div class="form-group">
                                <label class="required" for="firstname">Imię</label>
                                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="firstname" id="firstname" value="{{ old('firstname', '') }}" required>
                                @error('firstname')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p id="counter_firstname" class="text-sm">0 / 255 znaków</p>
                            </div>

                            <div class="form-group">
                                <label class="required" for="lastname">Nazwisko</label>
                                <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="lastname" id="lastname" value="{{ old('lastname', '') }}" required>
                                @error('lastname')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p id="counter_lastname" class="text-sm">0 / 255 znaków</p>
                            </div>

                            <div class="form-group">
                                <label class="required" for="email">Email</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" maxlength="255" type="email" name="email" id="email" value="{{ old('email', '') }}" required>
                                @error('email')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p id="counter_email" class="text-sm">0 / 255 znaków</p>
                            </div>

                            <div class="form-group">
                                <label class="required" for="telephone">Numer telefonu</label>
                                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="telephone" id="telephone" value="{{ old('telephone', '') }}" required>
                                @error('telephone')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p id="counter_telephone" class="text-sm">0 / 255 znaków</p>
                            </div>

                            <div class="form-group">
                                <label class="required" for="role">Rola</label>
                                <select name="role" id="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" required>
                                    @if (Auth::user()->role == 'admin')<option value="admin">Admin</option>@endif
                                    <option value="shop">Sklep</option>
                                    <option value="organisation">Stowarzyszenie</option>
                                </select>
                                @error('role')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="required" for="password">Hasło</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" maxlength="255" type="password" name="password" id="password" required>
                                @error('password')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required" for="password_confirmation">Powtórz hasło</label>
                                <input class="form-control" maxlength="255" type="password" name="password_confirmation" id="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">Utwórz</button>
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

@section('script')

<script>
    $('#name').on('keyup propertychange paste', function(){
        var chars = $('#name').val().length;
        $('#counter_name').html(chars +' / 255 znaków');
    });

    $('#firstname').on('keyup propertychange paste', function(){
        var chars = $('#firstname').val().length;
        $('#counter_firstname').html(chars +' / 255 znaków');
    });

    $('#lastname').on('keyup propertychange paste', function(){
        var chars = $('#lastname').val().length;
        $('#counter_lastname').html(chars +' / 255 znaków');
    });

    $('#email').on('keyup propertychange paste', function(){
        var chars = $('#email').val().length;
        $('#counter_email').html(chars +' / 255 znaków');
    });

    $('#telephone').on('keyup propertychange paste', function(){
        var chars = $('#telephone').val().length;
        $('#counter_telephone').html(chars +' / 255 znaków');
    });

    $(document).ready(function() {
        var chars_name = $('#name').val().length;
        $('#counter_name').html(chars_name +' / 255 znaków');

        var chars_firstname = $('#firstname').val().length;
        $('#counter_firstname').html(chars_firstname +' / 255 znaków');

        var chars_lastname = $('#lastname').val().length;
        $('#counter_lastname').html(chars_lastname +' / 255 znaków');

        var chars_email = $('#email').val().length;
        $('#counter_email').html(chars_email +' / 255 znaków');

        var chars_telephone = $('#telephone').val().length;
        $('#counter_telephone').html(chars_telephone +' / 255 znaków');
    });

</script>

@endsection
