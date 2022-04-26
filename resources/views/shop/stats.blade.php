@extends('layouts.app')

@section('title')
{{ __('Wykres miast') }}
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
              <h6 class="h2 text-white d-inline-block mb-0">{{ __('Statystyki') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">{{ __('Statystyki') }}</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
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
                    <div class="col">
                      <h3 class="mb-0">Zestawienie wg. miast</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <canvas id="chart1" style="max-height:600px;"></canvas>
                          </div>
                          <div class="col-lg-6">
                              <div class="table-responsive">
                                    <table class="table align-items-center text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort">Miasto</th>
                                                <th scope="col" class="sort">Ilość</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <tr>
                                                <th scope="col" class="sort">Rybnik</th>
                                                <th scope="col" class="sort">{{ $stats['rybnik'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Jejkowice</th>
                                                <th scope="col" class="sort">{{ $stats['jejkowice'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Szczerbice</th>
                                                <th scope="col" class="sort">{{ $stats['szczerbice'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Gaszowice</th>
                                                <th scope="col" class="sort">{{ $stats['gaszowice'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Czernica</th>
                                                <th scope="col" class="sort">{{ $stats['czernica'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Lyski</th>
                                                <th scope="col" class="sort">{{ $stats['lyski'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Sumina</th>
                                                <th scope="col" class="sort">{{ $stats['sumina'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Rudy</th>
                                                <th scope="col" class="sort">{{ $stats['rudy'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Rydułtowy</th>
                                                <th scope="col" class="sort">{{ $stats['rydultowy'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Radlin</th>
                                                <th scope="col" class="sort">{{ $stats['radlin'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Pszów</th>
                                                <th scope="col" class="sort">{{ $stats['pszow'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Jankowice</th>
                                                <th scope="col" class="sort">{{ $stats['jankowice'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Świerklany</th>
                                                <th scope="col" class="sort">{{ $stats['swierklany'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Żory</th>
                                                <th scope="col" class="sort">{{ $stats['zory'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Czerwionka-leszczyny</th>
                                                <th scope="col" class="sort">{{ $stats['czerleszcz'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Palowice</th>
                                                <th scope="col" class="sort">{{ $stats['palowice'] }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort">Wodzisław śląski</th>
                                                <th scope="col" class="sort">{{ $stats['wodzislaw'] }}</th>
                                            </tr>
                                        </tbody>

                                </table>
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

    const labels1 = ['Rybnik', 'Jejkowice', 'Szczerbice', 'Gaszowice', 'Czernica', 'Lyski', 'Sumina', 'Rudy', 'Rydułtowy', 'Radlin', 'Pszów', 'Jankowice', 'Świerklany', 'Żory', 'Czerwionka-leszczyny', 'Palowice', 'Wodzisław Śląski'];

    const data1 = {
      labels: labels1,
      datasets: [{
        label: "Wykresy miast",
        backgroundColor: ['rgb(127, 255, 212)', 'rgb(230, 255, 250)', 'rgb(153, 102, 204)', 'rgb(54, 65, 53)', 'rgb(0, 49, 83)', 'rgb(254, 254, 51)', 'rgb(194,	178, 128)', 'rgb(65, 105, 225)', 'rgb(128, 0, 0)', 'rgb(255, 191, 0)', 'rgb(107, 86, 54)', 'rgb(51, 0, 204)', 'rgb(255, 163, 212)', 'rgb(0, 255, 255)', 'rgb(157, 91, 3)', 'rgb(227, 66, 52)', 'rgb(195, 92, 111)'],
        borderColor: ['rgb(127, 255, 212)', 'rgb(230, 255, 250)', 'rgb(153, 102, 204)', 'rgb(54, 65, 53)', 'rgb(0, 49, 83)', 'rgb(254, 254, 51)', 'rgb(194,	178, 128)', 'rgb(65, 105, 225)', 'rgb(128, 0, 0)', 'rgb(255, 191, 0)', 'rgb(107, 86, 54)', 'rgb(51, 0, 204)', 'rgb(255, 163, 212)', 'rgb(0, 255, 255)', 'rgb(157, 91, 3)', 'rgb(227, 66, 52)', 'rgb(195, 92, 111)'],
        data: [{{ "0 , ".$stats['jejkowice'].", ".$stats['szczerbice'].", ".$stats['gaszowice'].", ".$stats['czernica'].", ".$stats['lyski'].", ".$stats['sumina'].", ".$stats['rudy'].", ".$stats['rydultowy'].", ".$stats['radlin'].", ".$stats['pszow'].", ".$stats['jankowice'].", ".$stats['swierklany'].", ".$stats['zory'].", ".$stats['czerleszcz'].", ".$stats['palowice'].", ".$stats['wodzislaw'] }}],
      },
    ]
    };

    const config1 = {
      type: 'pie',
      data: data1,
      options: {
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 20
                    }
                }
            }
        }
    }
    };
  </script>

<script>
    const myChart1 = new Chart(document.getElementById('chart1'),config1);
  </script>


@endsection


