@extends('layouts.app')

@section('title')
{{ __('main.login') }}
@endsection

@section('body')
class="bg-default"
@endsection

@section('content')

<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container text-primary">
        <div class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
            <a class="ml-1" href="{{ route('home') }}" rel="noopener noreferrer">
                <img src="{{ url('/assets/img/logo.svg') }}" style="min-height: 55px;">
              </a>
            <a class="text-white ml-2" href="{{ route('home') }}"> uaSystem</a>
        </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-8 collapse-brand text-center mx-auto">
              <a href="" class="w-100 text-center mx-auto" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg" class="text-center mx-auto my-2" alt="Ukraine flag">
            </a>
            </div>
            <div class="col-4 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link text-center">
                <span class="nav-link-inner--text">{{ __('main.menu.mainpage') }}</span>
              </a>
            </li>

          </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            @include('lang')
          <li class="nav-item d-lg-block ml-lg-4 text-center">
            <a href="" class="btn btn-neutral btn-icon text-center">
              <span class="btn-inner--icon">
                <i class="fas fa-handshake mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ __('main.login') }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="main-content">
    <div class="header bg-gradient-primary py-8 py-lg-8 pt-lg-9">
        <div class="container">
          <div class="header-body text-center mb-6">
            <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8 col-md-8 px-5">
                <h1 class="display-1 text-white mt-3 font-weight-700">{{ Str::upper(__('main.login')) }}</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
              <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>
      </div>

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center px-2"> <!-- row justify-content-center col-lg-5 col-md-7 -->
          <div class="card bg-secondary border-0 mb-0 col-lg-5 col-md-7">
            <div class="">
                  <div class="">
                    <div class="card-header bg-transparent text-center">
                        <h1 class="text-center">{{ __('uaSystem') }}</h1>
                      </div>
                      <div class="card-body pt-lg-3 pb-lg-4 px-lg-5">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                          <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                              </div>
                              <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('main.auth.login') }}" autofocus>
                            </div>
                          </div>
                          <div class="mt-2 mb-3">
                            @error('name')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                              </div>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" placeholder="{{ __('main.auth.password') }}">
                            </div>
                          </div>
                          <div class="form-group">
                            @error('password')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">
                              <span class="text-muted">{{ __('main.auth.rememberme') }}</span>
                            </label>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-info text-dark mt-3 mb-1 w-100">{{ __('main.login') }}</button>
                          </div>
                        </form>
                        <hr class="my-3">
                        <h2 class="text-center"><strong>{{ __('main.lang') }}</strong></h2>
                            <div class="row mb-3 text-center">
                                <div class="col">
                                    <span class="shortcut-media avatar rounded-circle">
                                        <a href="{{ route('language', ['pl']) }}"><img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/pl.svg"></a>
                                    </span>

                                </div>
                                <div class="col">
                                    <span class="shortcut-media avatar rounded-circle">
                                        <a href="{{ route('language', ['en']) }}"><img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/gb.svg"></a>
                                    </span>
                                </div>
                                <div class="col">
                                    <span class="shortcut-media avatar rounded-circle">
                                        <a href="{{ route('language', ['uk']) }}"><img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/ua.svg"></a>
                                    </span>
                                </div>
                            </div>
                            <div class="text-center text-sm mt-2">
                                <a href="{{ route('password.request') }}" class="mx-2">{{ __('Zapomniałeś hasła?') }}</a>
                              </div>
                      </div>
                </div>
          </div>
      </div>
    </div>
  </div>

  @include('websitefooter')

@endsection



