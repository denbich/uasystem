@extends('layouts.app')

@section('title')
{{ __('Dodaj uchodźca') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header d-flex mt-2 align-items-center w-100">
        <a class="mt-2 mx-auto" href="{{ route('s.dashboard') }}">
            <h1>uaSystem</h1>
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
            <li class="nav-item">
                <a class="nav-link active" href="#refugees" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="refugees">
                  <i class="fas fa-users text-primary"></i>
                  <span class="nav-link-text">Uchodźcy</span>
                </a>
                <div class="collapse show" id="refugees" style="">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item active">
                        <a href="{{ route('s.ukrainian.list') }}" class="nav-link">
                          <span class="sidenav-normal"> Lista </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('s.ukrainian.search') }}" class="nav-link">
                        <span class="sidenav-normal"> Wyszukaj </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('s.ukrainian.create') }}" class="nav-link">
                        <span class="sidenav-normal"> Dodaj </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

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
                <h6 class="h2 text-white d-inline-block mb-0">Dodaj uchodźca</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">uchodźcy</li>
                    <li class="breadcrumb-item"><a href="{{ route('s.ukrainian.create') }}">dodaj</a></li>
                  </ol>
                </nav>
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
                    <h3 class="text-center"></h3>
                    <h3 class="text-center">Opcje</h3>
                    <a href="{{ route('s.ukrainian.edit', [$uk->id]) }}" class="btn btn-success w-100 my-2 text-white">Edytuj dane uchodźca</a>
                    <hr class="my-2">
                    <form action="{{ route('s.ukrainian.addvisit', [$uk->id]) }}" method="post" id="addvisit{{ $uk->id }}">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 my-2">Dodaj wizytę</button>
                        </form>
                </div>
              </div>
            </div>
            <div class="col-lg-9 h-100 order-lg-1">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Informacje o uchodźcu </h3>
                    </div>
                    <div class="col-4 text-right">
                        <h3 class="mb-0">Ilość wizyt: <span class="badge badge-primary">{{ $uk->ukrainian_visit_count }}</span></h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row pt-2">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="font-weight-bold">Imię</label>
                                <p>{{ $uk->firstname }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Data urodzenia</label>
                                <p>{{ $uk->birth }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Numer telefonu</label>
                                <p><a href="tel:{{ $uk->telephone }}">{{ $uk->telephone }}</a></p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Wykonywana praca</label>
                                <p>{{ $uk->work }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Informacja o dzieciach</label>
                                <p>{{ $uk->children }}</p>
                            </div>
                            <hr>
                            <div class="mb-2">
                                <label class="font-weight-bold">ID karty</label>
                                <p>{{ $uk->card_id }}</p>
                            </div>
                            <hr>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="font-weight-bold">Nazwisko</label>
                                <p>{{ $uk->lastname }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">płeć</label>
                                <p>@switch($uk->gender)
                                    @case('f') Kobieta @break
                                    @case('m') Mężczyzna @break
                                @endswitch</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Adres pobytu</label>
                                <p>{{ $uk->address }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Chęć pozostania w Polsce</label>
                                <p>{{ $uk->stay }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">Uwagi</label>
                                <p>{{ $uk->remarks }}</p>
                            </div>
                            <hr>
                            <div class="mb-2">
                                <label class="font-weight-bold">RFID</label>
                                <p>{{ $uk->rfid }}</p>
                            </div>
                            <hr>
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


