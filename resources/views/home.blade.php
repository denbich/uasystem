@extends('layouts.app')

@section('title')
{{ __('Strona główna') }}
@endsection

@section('content')
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container text-primary">
        <div class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
            <a class="text-white" href="{{ route('home') }}">uaSystem</a>
              <a class="ml-1" href="{{ route('home') }}" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg" alt="">
              </a>
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
              <a href="{{ route('home') }}" class="nav-link text-center font-weight-900">
                <span class="nav-link-inner--text">{{ __('main.menu.mainpage') }}</span>
              </a>
            </li>

          </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            @include('lang')

          <li class="nav-item d-lg-block ml-lg-4 text-center">
            <a href="{{ route('login') }}" class="btn btn-neutral btn-icon text-center">
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
        <div class="container-fluid my-5">
          <div class="header-body text-center mb-8">
            <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8 col-md-8 px-5">
                <h1 class="display-1 text-white mt-3 font-weight-700">{{ Str::upper(__('main.auth.panel')) }}</h1>

                <a href="{{ route('login') }}" class="btn btn-neutral btn-icon text-xl text-center btn-lg mt-2">
                    <span class="btn-inner--icon">
                      <i class="fas fa-sign-in-alt mr-2"></i>
                    </span>
                    <span class="nav-link-inner--text">{{ __('main.login') }}</span>
                  </a>
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
              <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>
      </div>

    <div class="container-fluid mt--8">
    </div>
  </div>


@endsection

