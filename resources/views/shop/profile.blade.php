@extends('layouts.app')

@section('title')
{{ __('shop.profile.title') }}
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
                <h6 class="h2 text-white d-inline-block mb-0">{{ __('shop.profile.title') }}</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('shop.profile.title') }}</li>
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
        <div class="h-100">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                          <div class="row align-items-center">
                            <div class="col-8">
                              <h3 class="mb-0">{{ __('shop.profile.title') }} </h3>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                            @if (session('edit_user') == true)
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span class="alert-text"><strong>{{ __('main.success') }}!</strong> {{ __('shop.profile.alert') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <form action="{{ route('s.profile') }}" method="post">
                                @csrf
                                <div class="row pt-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="required" for="name">{{ __('shop.profile.username') }}</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
                                            @error('name')
                                                <span class="text-danger small" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="firstname">{{ __('shop.profile.firstname') }}</label>
                                            <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="firstname" id="firstname" value="{{ Auth::user()->firstname }}" required>
                                            @error('firstname')
                                                <span class="text-danger small" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('s.settings') }}" class="btn btn-primary w-100">{{ __('shop.settings.button') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="required" for="firstname">{{ __('shop.profile.email') }}</label>
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" maxlength="255" type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
                                            @error('email')
                                                <span class="text-danger small" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="lastname">{{ __('shop.profile.lastname') }}</label>
                                            <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="lastname" id="lastname" value="{{ Auth::user()->lastname }}" required>
                                            @error('lastname')
                                                <span class="text-danger small" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="telephone">{{ __('shop.profile.telephone') }}</label>
                                            <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" maxlength="255" type="tel" name="telephone" id="telephone" value="{{ Auth::user()->telephone }}" required>
                                            @error('telephone')
                                                <span class="text-danger small" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <button class="btn btn-success w-100">{{ __('shop.profile.button') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                          <div class="align-items-center">
                              <h3 class="mb-0">{{ __('shop.profile.divchecktitle') }} </h3>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label h-100" for="Check1">{{ __('shop.profile.check1') }}</label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label h-100" for="Check2">{{ __('shop.profile.check2') }}</label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Check3">
                                    <label class="custom-control-label h-100" for="Check3">{{ __('shop.profile.check3') }}</label>
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


@section('script')
<script>
        if($.cookie("DisplayDigital") == 'true')
        {
            $('#Check1').prop('checked', true);
        } else {
            $('#Check1').prop('checked', false);
        }

        if($.cookie("DisplayQuestions") == 'true')
        {
            $('#Check2').prop('checked', true);
        } else {
            $('#Check2').prop('checked', false);
        }

        if($.cookie("FirstRecord") == 'true')
        {
            $('#Check3').prop('checked', true);
        } else {
            $('#Check3').prop('checked', false);
        }

        $('#Check1').change(function () {
            if ($('#Check1').prop('checked'))
            {
                $.cookie("DisplayDigital", true, { expires: 365, path: '/' });
            } else {
                $.cookie("DisplayDigital", false, { expires: 365, path: '/' });
            }
        });
        $('#Check2').change(function () {
            if ($('#Check2').prop('checked'))
            {
                $.cookie("DisplayQuestions", true, { expires: 365, path: '/' });
            } else {
                $.cookie("DisplayQuestions", false, { expires: 365, path: '/' });
            }
        });

        $('#Check3').change(function () {
            if ($('#Check3').prop('checked'))
            {
                $.cookie("FirstRecord", true, { expires: 365, path: '/' });
            } else {
                $.cookie("FirstRecord", false, { expires: 365, path: '/' });
            }
        });

</script>
@endsection
