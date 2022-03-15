@extends('layouts.app')

@section('title')
{{ __('Użytkownik')." ".$user->name }}
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
                    <a href="{{ route('a.user.edit', [$user->id]) }}" class="btn btn-success w-100 my-2 text-white">Edytuj użytkownika</a>
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
                    <div class="row pt-2">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="font-weight-bold">Nazwa użytkownika</label>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Imię</label>
                                <p>{{ $user->firstname }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Adres email</label>
                                <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="font-weight-bold">Data utworzenia</label>
                                <p>{{ $user->created_at }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Nazwisko</label>
                                <p>{{ $user->lastname }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Numer telefonu</label>
                                <p><a href="tel:{{ $user->telephone }}">{{ $user->telephone }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

            @include('footer')
      </div>
  </div>

@endsection
