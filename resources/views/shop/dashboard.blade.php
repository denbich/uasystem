@extends('layouts.app')

@section('title')
{{ __('Panel sklepu') }}
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
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('s.dashboard') }}">
                <i class="ni ni-tv-2 "></i>
                <span class="nav-link-text">Panel</span>
              </a>
            </li>
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
              <h6 class="h2 text-white d-inline-block mb-0">Sklep Półki Dobra</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Panel</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('s.ukrainian.create') }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> Nowy uchodźca</a>
            </div>
          </div>
          <div class="row" style="display: flex;
          flex-wrap: wrap;">
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Twoje ID</h5>
                      <span class="h2 font-weight-bold mb-0">{{ Auth::user()->id }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-id-card-alt"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Liczba zarejestrowanych uchodźców</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $ukrainians }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Liczba ponownych wizyt</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $visits }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 h-100">
                <div class="card card-stats">
                  <div class="card-body my-3">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Dzisiejsza liczba zarejestowanych</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $signed }}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
        <div class="">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Statystyki rejestracji i ponownych wizyt (Ostatnie 7 dni)</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ route('s.ukrainian.list') }}" class="btn btn-sm btn-primary">Lista uchodźców</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div>
                    <canvas id="chart1" style="max-height:400px;"></canvas>
                  </div>
            </div>
          </div>
        </div>
        <div class="">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Pomoc</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p>Jeśli masz probem, propozycję bądź pytanie to śmiało pisz na adres:
                    <a target="_blank" rel="nofollow" href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a>
                </p>
                <!--<a target="_blank" rel="nofollow" href="#"><i class="far fa-question-circle"></i> Centrum pomocy</a>-->
              </div>
            </div>
          </div>

      <div class="row">
        <div class="col-xl-6">

        </div>

      </div>

      @include('footer')
    </div>
  </div>

@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>

<script>
    const labels = [{!! "'".date('Y-m-d', strtotime($chart[7]['date']))."', '".date('Y-m-d', strtotime($chart[6]['date']))."', '".date('Y-m-d', strtotime($chart[5]['date']))."', '".date('Y-m-d', strtotime($chart[4]['date']))."', '".date('Y-m-d', strtotime($chart[3]['date']))."', '".date('Y-m-d', strtotime($chart[2]['date']))."', '".date('Y-m-d', strtotime($chart[1]['date']))."'" !!}];

    const data = {
      labels: labels,
      datasets: [{
        label: 'Liczba nowych rejestracji',
        backgroundColor: 'rgb(0, 87, 183)',
        borderColor: 'rgb(0, 87, 183)',
        data: [{{ $chart[7]['new'].", ".$chart[6]['new'].", ".$chart[5]['new'].", ".$chart[4]['new'].", ".$chart[3]['new'].", ".$chart[2]['new'].", ".$chart[1]['new'] }}],
        stack: 'Stack 0',
      },
      {
        label: 'Liczba Ponownych wizyt',
        backgroundColor: 'rgb(255, 215, 0)',
        borderColor: 'rgb(255, 215, 0)',
        data: [{{ $chart[7]['old'].", ".$chart[6]['old'].", ".$chart[5]['old'].", ".$chart[4]['old'].", ".$chart[3]['old'].", ".$chart[2]['old'].", ".$chart[1]['old'] }}],
        stack: 'Stack 1',
      }
    ]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {}
    };
  </script>

<script>
    const myChart = new Chart(document.getElementById('chart1'),config);
  </script>


@endsection


