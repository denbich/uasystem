@extends('layouts.app')

@section('title')
{{ __('Lista wizyt uchodźca') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        @include('shop.include.logo')
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @include('shop.include.dashboard')
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('shop.sidemenu.general.title') }}</span>
        </h6>
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#refugees" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="refugees">
                  <i class="fas fa-users text-primary"></i>
                  <span class="nav-link-text">{{ __('shop.sidemenu.general.refugees.title') }}</span>
                </a>
                <div class="collapse show" id="refugees" style="">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item active">
                        <a href="{{ route('s.ukrainian.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('shop.sidemenu.general.refugees.list') }} </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('s.ukrainian.search') }}" class="nav-link">
                        <span class="sidenav-normal"> {{ __('shop.sidemenu.general.refugees.search') }} </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('s.ukrainian.create') }}" class="nav-link">
                        <span class="sidenav-normal"> {{ __('shop.sidemenu.general.refugees.add') }} </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

          </ul>

          <hr class="my-3">
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('shop.sidemenu.other.title') }}</span>
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
                <h6 class="h2 text-white d-inline-block mb-0">{{ __('Lista wizyt') }}</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('shop.sidemenu.general.refugees.title') }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('s.ukrainian.list') }}">{{ __('Wizyty') }}</a></li>
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                @include('shop.include.button')
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
                  <h3 class="mb-0">{{  __('Lista wizyt uchodźca') }}</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('s.ukrainian.show', [$id]) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Powrót</a>
                </div>
              </div>
            </div>
              <div class="card-body">
                @if (session('delete_visit') == true)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{ __('main.success') }}!</strong> {{ __('Wizyta została usunięta pomyślnie!') }}</span>
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
                                <th>{{ __('Data wizyty') }}</th>
                                <th>{{ __('Ubrania') }}</th>
                                <th>{{ __('Jedzenie') }}</th>
                                <th>{{ __('Chemia') }}</th>
                                <th>{{ __('main.options') }}</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php $i = 0; @endphp
                            @foreach ($uk as $visit)
                            @php $i++; @endphp
                            <tr>
                                <td>{{ date("H:i:s d.m.Y", strtotime($visit->created_at)) }} r.</td>
                                <td>
                                @if ($visit->clothes == 1)
                                <span class="badge badge-dot mr-4"><i class="bg-success"></i><span class="status">{{ __('main.yes') }}</span></span>
                                @else
                                <span class="badge badge-dot mr-4"><i class="bg-danger"></i><span class="status">{{ __('main.no') }}</span></span>
                                @endif
                                </td>
                                <td>
                                @if ($visit->food == 1)
                                <span class="badge badge-dot mr-4"><i class="bg-success"></i><span class="status">{{ __('main.yes') }}</span></span>
                                @else
                                <span class="badge badge-dot mr-4"><i class="bg-danger"></i><span class="status">{{ __('main.no') }}</span></span>
                                @endif
                                </td>
                                <td>
                                @if ($visit->detergents == 1)
                                <span class="badge badge-dot mr-4"><i class="bg-success"></i><span class="status">{{ __('main.yes') }}</span></span>
                                @else
                                <span class="badge badge-dot mr-4"><i class="bg-danger"></i><span class="status">{{ __('main.no') }}</span></span>
                                @endif
                                </td>
                                <td> <button type="button" data-toggle="modal" data-target="#modaldelete{{ $visit->id }}" class="btn btn-sm btn-danger w-100" @if ($i == 1) disabled @endif>Usuń</button></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

              </div>
          </div>

      @include('footer')
    </div>
  </div>

  @foreach ($uk as $visit)
  <div class="modal fade" id="modaldelete{{ $visit->id }}" tabindex="-1" role="dialog" aria-labelledby="labelmodaldelete{{ $visit->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('s.ukrainian.visits', [$visit->ukrainian_id]) }}" method="post">
            @csrf
            <input type="hidden" name="visit_id" value="{{ $visit->id }}">
            <div class="modal-header">
              <h5 class="modal-title" id="labelmodaldelete{{ $visit->id }}">{{ __('Usuń wizytę') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body py-0">
                <h1>Czy jesteś pewnien, że chcesz usunąć tę wizytę?</h1>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main.cancel') }}</button>
              <button type="submit" class="btn btn-danger">{{ __('main.delete') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach


@endsection


