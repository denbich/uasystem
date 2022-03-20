@extends('layouts.app')

@section('title')
{{ __('Szukaj uchodźców') }}
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
            <li class="nav-item">
                <a class="nav-link active" href="#refugees" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="refugees">
                  <i class="fas fa-users text-primary"></i>
                  <span class="nav-link-text">Uchodźcy</span>
                </a>
                <div class="collapse show" id="refugees" style="">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('s.ukrainian.list') }}" class="nav-link">
                          <span class="sidenav-normal"> Lista </span>
                        </a>
                      </li>
                    <li class="nav-item active">
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
                <h6 class="h2 text-white d-inline-block mb-0">Szukaj uchodźców</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">uchodźcy</li>
                    <li class="breadcrumb-item"><a href="{{ route('s.ukrainian.search') }}">szukaj</a></li>
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
                  <h3 class="mb-0">szukaj uchodźców </h3>
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
                @if (session('change_digital') == true)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Sukces!</strong> Zmiana cyfrowych danych zakończyła się pomyślnie!</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <div id="alertsdiv" class="d-none">
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
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="{{ route('s.ukrainian.search') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q" id="search" placeholder="Szukaj uchodźcy" aria-label="Szukaj uchodźcy" aria-describedby="search-button" value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-primary" type="submit" id="search-button">Szukaj</button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
                <div id="resultsearch">
                    @if(isset($_GET['q']) && !empty($_GET['q']))
                    @if (!$ukrainians->isEmpty())
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr> <th>Imię i nazwisko</th>
                                    <th>Ilość wizyt</th>
                                    <th>Ostatnia wizyta  - potrzeby</th>
                                    <th>Data urodzenia</th>
                                    <th>Dzieci</th>
                                    <th>Opcje</th>
                                    </tr>
                                </thead>
                            <tbody class="list">
                            @foreach ($ukrainians as $uk)
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
                            <td>{{ $uk->ukrainian_visit->last()->created_at }} -
                                @if ($uk->ukrainian_visit->last()->food == 1) Jedzenie, @endif
                                @if ($uk->ukrainian_visit->last()->detergents == 1) Chemia, @endif
                                @if ($uk->ukrainian_visit->last()->clothes == 1) Ubrania @endif
                            </td>
                            <td>{{ date("d.m.Y", strtotime($uk->birth)) }} r.</td>
                            <td> <div class="d-flex align-items-center"> <span class="completion mr-2">{{ $uk->children }}</span> </div> </td>
                            <td class="text-center">
                                <a href="#modalukinfo{{ $uk->id }}" data-toggle="modal" data-target="#modalukinfo{{ $uk->id }}" class="text-lg mx-1"><i class="fas fa-qrcode"></i></a>
                                <a href="#modaluk{{ $uk->id }}" data-toggle="modal" data-target="#modaluk{{ $uk->id }}" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a>
                                <a href="{{ route('s.ukrainian.show', [$uk->id]) }}" class="text-lg mx-1"> <i class="fas fa-search"></i> </a>
                                <a href="{{ route('s.ukrainian.edit', [$uk->id]) }}" class="text-lg mx-1"> <i class="fas fa-edit"></i> </a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    @else
                    <h1 class='text-center text-danger'>Brak wyników!</h1>
                    @endif

                    @endif
                </div>
              </div>
          </div>

      @include('footer')
    </div>
  </div>

  @isset($ukrainians)
  @foreach ($ukrainians as $uk)
  <div class="modal fade" id="modaluk{{ $uk->id }}" tabindex="-1" role="dialog" aria-labelledby="labelmodaluk{{ $uk->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <form action="{{ route('s.ukrainian.addvisit', [$uk->id]) }}" method="post">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="labelmodaluk{{ $uk->id }}">Powód wizyty</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Check1{{ $uk->id }}" name="clothes" checked>
                            <label class="custom-control-label" for="Check1{{ $uk->id }}">Ubrania</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Check2{{ $uk->id }}" name="food">
                            <label class="custom-control-label" for="Check2{{ $uk->id }}">Jedzenie</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Check3{{ $uk->id }}" name="detergents">
                            <label class="custom-control-label" for="Check3{{ $uk->id }}">Chemia / kosmetyki</label>
                        </div>
                        <div class="mt-3">
                            <h3>Wizyty w sklepie</h3>
                            <div class="alert alert-secondary" role="alert">
                                <ul>
                                    @forelse ($uk->ukrainian_visit as $visit)
                                    <li>
                                        {{ $visit->created_at }} -
                                        @if ($visit->food == 1) Jedzenie, @endif
                                        @if ($visit->detergents == 1) Chemia, @endif
                                        @if ($visit->clothes == 1) Ubrania @endif
                                    </li>
                                @empty
                                    <h4 class="text-danger">Brak wizyt!</h4>
                                @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Zatwierdź</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalukinfo{{ $uk->id }}" tabindex="-1" role="dialog" aria-labelledby="labelmodalukinfo{{ $uk->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="{{ route('s.ukrainian.digital', [$uk->id]) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="labelmodalukinfo{{ $uk->id }}">Edytuj cyfrowe dane uchodźca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body py-0">
                    <div class="form-group">
                        <label class="required w-100" for="rfid">RFID</label>
                        <input class="form-control {{ $errors->has('rfid') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="rfid" id="rfid" value="{{ $uk->rfid }}">
                        @error('rfid')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="required w-100" for="diia">Diia (Дія) <i><img style="max-height: 25px;" src="https://plan2.diia.gov.ua/assets/img/main/diya.svg" alt=""></i></label>
                        <input class="form-control {{ $errors->has('diia') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="diia" id="diia" value="{{ $uk->diia }}">
                        @error('diia')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required" for="mobywatel">mObywatel <i><img style="max-height: 25px;" src="https://www.gov.pl/img/icons/godlo-12.svg" alt=""></i></label>
                        <input class="form-control {{ $errors->has('mobywatel') ? 'is-invalid' : '' }}" maxlength="65535" type="text" name="mobywatel" id="mobywatel" value="{{ $uk->mobywatel }}">
                        @error('mobywatel')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                  </div>
            </form>
          </div>
        </div>
      </div>
  @endforeach
  @endisset

@endsection

@section('script')
<!--<script>
    $(document).ready(function() {
        var search = $('#search').val();
        $.ajax({
        url: "{{ route('s.ukrainian.searchukrainian') }}",
        type: "post",
        dataType: "html",
        data:{
            search: search,
          _token: '{{ csrf_token() }}',
        },
        success:function(response){
            $('#resultsearch').html(response);
        },
        error: function(error) {
         console.log(error);
        }
       });

    });
</script>
    <script>
        $('#search').on('keyup propertychange paste', function(){
        var search = $('#search').val();
        $.ajax({
        url: "{{ route('s.ukrainian.searchukrainian') }}",
        type: "get",
        dataType: "HTML",
        data:{
            search: search,
          _token: '{{ csrf_token() }}',
        },
        success:function(response){
            $('#resultsearch').html(response);
        },
        error: function(error) {
         console.log(error);
        }
       });
    });
    </script>-->

    <script>
        function add_visit(value)
        {
            var search = $('#search').val();
            $.ajax({
        url: "{{ route('s.ukrainian.visit') }}",
        type: "GET",
        dataType: "html",
        data:{
            ukrainian_id: value,
            search: search,
          _token: '{{ csrf_token() }}',
        },
        success:function(response){
            $('#resultsearch').html(response);
            $('#alertsdiv').removeClass('d-none');
            setTimeout(function(){
                $('#alertsdiv').addClass('d-none');
            },4000);

        },
        error: function(error) {
         console.log(error);
        }
       });
        }
    </script>

    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    </script>
@endsection
