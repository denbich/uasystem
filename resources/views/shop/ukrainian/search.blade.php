@extends('layouts.app')

@section('title')
{{ __('Szukaj uchodźców') }}
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
                    <div class="col-lg-7">
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Szukaj uchodźcy" aria-label="Szukaj użytkownika">
                              </div>
                        </form>
                    </div>
                </div>
                <div id="resultsearch">

                </div>
              </div>
          </div>

      @include('footer')
    </div>
  </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        var search = $('#search').val();
        $.ajax({
        url: "{{ route('s.ukrainian.searchukrainian') }}",
        type: "GET",
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
        type: "GET",
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
        function add_visit(value)
        {
            var search = $('#search').val();
            $.ajax({
        url: "{{ route('s.ukrainian.visit') }}",
        type: "POST",
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
