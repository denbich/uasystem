@extends('layouts.app')

@section('title')
{{ __('shop.dashboard.title') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      @include('shop.include.logo')
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('s.dashboard') }}">
                <i class="ni ni-tv-2 "></i>
                <span class="nav-link-text">{{ __('shop.sidemenu.dashboard') }}</span>
              </a>
            </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('shop.sidemenu.general.title') }}</span>
        </h6>
          <ul class="navbar-nav">
            @include('shop.include.refugees')
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
              <h6 class="h2 text-white d-inline-block mb-0">{{ __('shop.dashboard.title') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('shop.sidemenu.dashboard') }}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              @include('shop.include.button')
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap;">
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">{{ __('shop.dashboard.refugeescount') }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $ukrainians }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fa-solid fa-rectangle-list"></i>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">{{ __('shop.dashboard.todaycount') }}</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $signed }}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                            <i class="fa-solid fa-person-circle-plus"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        @if ($stats['refugees'] >= 0)
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $stats['refugees'] }}%</span>
                        @else
                        <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> {{ $stats['refugees'] }}%</span>
                        @endif

                        <span class="text-nowrap">{{ __('shop.dashboard.stat') }}</span>
                      </p>
                  </div>
                </div>
              </div>
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">{{ __('shop.dashboard.visitscount') }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $visits }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                        <i class="fa-solid fa-clock-rotate-left"></i>
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
                        <h5 class="card-title text-uppercase text-muted mb-0">{{ __('shop.dashboard.todayvisit') }}</h5>
                        <span class="h2 font-weight-bold mb-0">@php $counta = $visits_today - $signed; @endphp {{ $counta }}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        @if ($stats['visits'] >= 0)
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $stats['visits'] }}%</span>
                        @else
                        <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> {{ $stats['visits'] }}%</span>
                        @endif

                        <span class="text-nowrap">{{ __('shop.dashboard.stat') }}</span>
                      </p>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">{{ __('shop.dashboard.stats.title') }}</h3>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('s.ukrainian.list') }}" class="btn btn-sm btn-primary">{{ __('shop.dashboard.stats.button') }}</a>
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
              <div class="col-lg-3">
                  <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">{{ __('shop.dashboard.help') }}</h3>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <img src="{{ url('/assets/img/help.svg') }}" alt="" class="w-100 p-4 mb-2">
                      <p>{{ __('shop.dashboard.helptext') }}
                          <a target="_blank" rel="nofollow" href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a>
                      </p>
                      <a href="{{ route('s.help_centre') }}"><i class="fas fa-info-circle text-primary"></i> {{ __('shop.sidemenu.other.help') }}</a>
                    </div>
                  </div>
                </div>
        </div>

      <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Chęć pozostania w polsce</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="chart2" style="max-height:400px;"></canvas>
                      </div>
                </div>
              </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Płeć</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="chart3" style="max-height:400px;"></canvas>
                      </div>
                </div>
              </div>
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
    const labels1 = [{!! "'".date('Y-m-d', strtotime($chart[7]['date']))."', '".date('Y-m-d', strtotime($chart[6]['date']))."', '".date('Y-m-d', strtotime($chart[5]['date']))."', '".date('Y-m-d', strtotime($chart[4]['date']))."', '".date('Y-m-d', strtotime($chart[3]['date']))."', '".date('Y-m-d', strtotime($chart[2]['date']))."', '".date('Y-m-d', strtotime($chart[1]['date']))."'" !!}];

    const data1 = {
      labels: labels1,
      datasets: [{
        label: "{{ __('shop.dashboard.stats.sign') }}",
        backgroundColor: 'rgb(0, 87, 183)',
        borderColor: 'rgb(0, 87, 183)',
        data: [{{ $chart[7]['new'].", ".$chart[6]['new'].", ".$chart[5]['new'].", ".$chart[4]['new'].", ".$chart[3]['new'].", ".$chart[2]['new'].", ".$chart[1]['new'] }}],
        stack: 'Stack 0',
      },
      {
        label: "{{ __('shop.dashboard.stats.visit') }}",
        backgroundColor: 'rgb(255, 215, 0)',
        borderColor: 'rgb(255, 215, 0)',
        data: [{{ $chart[7]['old'].", ".$chart[6]['old'].", ".$chart[5]['old'].", ".$chart[4]['old'].", ".$chart[3]['old'].", ".$chart[2]['old'].", ".$chart[1]['old'] }}],
        stack: 'Stack 1',
      }
    ]
    };

    const config1 = {
      type: 'bar',
      data: data1,
      options: {}
    };


    const labels2 = ['Tak', 'Nie', 'Może', 'Nie wie'];

    const data2 = {
      labels: labels2,
      datasets: [{
        label: "{{ __('shop.dashboard.stats.sign') }}",
        backgroundColor: ['rgb(8, 217, 214)', 'rgb(37, 42, 52)', 'rgb(255, 46, 99)', 'rgb(210, 210, 210)'],
        borderColor: ['rgb(8, 217, 214)', 'rgb(37, 42, 52)', 'rgb(255, 46, 99)', 'rgb(210, 210, 210)'],
        data: [{{ $stats2['stay']['yes'].", ".$stats2['stay']['no'].", ".$stats2['stay']['maybe'].", ".$stats2['stay']['tdk'] }}],
      },
    ]
    };

    const config2 = {
      type: 'doughnut',
      data: data2,
      options: {}
    };


    const labels3 = ['Kobieta', 'Mężczyzna'];

    const data3 = {
      labels: labels3,
      datasets: [{
        label: "{{ __('shop.dashboard.stats.sign') }}",
        backgroundColor: ['rgb(255, 138, 174)', 'rgb(154, 220, 255)'],
        borderColor: ['rgb(255, 138, 174)', 'rgb(154, 220, 255)'],
        data: [{{ $stats2['gender']['f'].", ".$stats2['gender']['m'] }}],
      },
    ]
    };

    const config3 = {
      type: 'pie',
      data: data3,
      options: {}
    };
  </script>

<script>
    const myChart1 = new Chart(document.getElementById('chart1'),config1);
    const myChart2 = new Chart(document.getElementById('chart2'),config2);
    const myChart3 = new Chart(document.getElementById('chart3'),config3);
  </script>


@endsection


