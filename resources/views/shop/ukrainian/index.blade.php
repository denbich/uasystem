@extends('layouts.app')

@section('title')
{{ __('Lista uchodźców') }}
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
                <h6 class="h2 text-white d-inline-block mb-0">Lista uchodźców</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">uchodźcy</li>
                    <li class="breadcrumb-item"><a href="{{ route('s.ukrainian.list') }}">Lista</a></li>
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
        <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Lista uchodźców </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#generatemodal" data-toggle="modal" data-target="#generatemodal" class="btn btn-sm btn-primary d-none"><i class="fas fa-clipboard-list"></i> Generuj listę</a>
                </div>
              </div>
            </div>
              <div class="card-body">
                @if (session('add_visit') == true)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Sukces!</strong> Wizyta została dodana pomyślnie!</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Imię i nazwisko</th>
                                <th>Ilość wizyt</th>
                                <th>Ostatnia wizyta</th>
                                <th>Data urodzenia</th>
                                <th>Numer tel.</th>
                                <th>Dzieci</th>
                                <th>Opcje</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($ukrainians as $uk)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="{{ route('a.user.show', [$uk->id]) }}">
                                              <div class="media-body">
                                                  <span class="name mb-0 text-sm">{{ $uk->firstname }} {{ $uk->lastname }}</span>
                                              </div>
                                            </a>
                                        </div>
                                    </th>
                                    <td><span class="badge badge-primary">{{ $uk->ukrainian_visit_count }}</span></td>
                                    <td>{{ $uk->ukrainian_visit->last()->created_at }}</td>
                                    <td>{{ date("d.m.Y", strtotime($uk->birth)) }} r.</td>
                                    <td>{{ $uk->telephone }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">{{ $uk->children }}</span>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('s.ukrainian.addvisit', [$uk->id]) }}" method="post" id="addvisit{{ $uk->id }}">
                                            @csrf
                                            </form>
                                        <a href="" onclick="event.preventDefault(); document.getElementById('addvisit{{ $uk->id }}').submit();" class="text-lg mx-1">
                                                <i class="fas fa-plus"></i>
                                            </a>

                                        <a href="{{ route('s.ukrainian.show', [$uk->id]) }}" class="text-lg mx-1">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="{{ route('s.ukrainian.edit', [$uk->id]) }}" class="text-lg mx-1">
                                          <i class="fas fa-edit"></i>
                                      </a>
                                    </td>
                                </tr>
                            @empty
                                <h2 class="text-center text-danger">Brak uchodźców!</h2>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $ukrainians->links() !!}
              </div>
          </div>

      @include('footer')
    </div>
  </div>

@endsection


