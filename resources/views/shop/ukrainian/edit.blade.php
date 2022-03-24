@extends('layouts.app')

@section('title')
{{ __('shop.refugees.edit.title') }}
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
                <h6 class="h2 text-white d-inline-block mb-0">{{ __('shop.refugees.edit.title') }}</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('shop.sidemenu.general.refugees.title') }}</li>
                    <li class="breadcrumb-item">{{ __('shop.refugees.edit.edit') }}</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
              <div class="card">
                <div class="card-body">
                    <h3 class="text-center"></h3>
                    <h3 class="text-center">{{ __('main.options') }}</h3>
                    <a href="{{ route('s.ukrainian.show', [$uk->id]) }}" class="btn btn-primary w-100 my-2 text-white">Wróć</a>
                </div>
              </div>
            </div>
            <div class="col-lg-9 h-100 order-lg-1">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">{{ __('shop.refugees.edit.title') }} </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    @if (session('edit_ukrainian') == true)
                <div class="justify-content-center">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{ __('main.success') }}!</strong> {{ __('shop.refugees.edit.alert') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                </div>
                @endif
                    <form action="{{ route('s.ukrainian.update', [$uk->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row pt-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="firstname">{{ __('shop.refugees.create.firstname') }}</label>
                                    <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="firstname" id="firstname" value="{{ $uk->firstname }}" required>
                                    @error('firstname')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="birth">{{ __('shop.refugees.create.birth') }}</label>
                                    <input class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}" maxlength="255" type="date" name="birth" id="birth" value="{{ $uk->birth }}" required>
                                    @error('birth')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="telephone">{{ __('shop.refugees.create.telephone') }}</label>
                                    <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" maxlength="255" type="tel" name="telephone" id="telephone" value="{{ $uk->telephone }}">
                                    @error('telephone')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="work">{{ __('shop.refugees.create.work') }}</label>
                                    <input class="form-control {{ $errors->has('work') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="work" id="work" value="{{ $uk->work }}">
                                    @error('work')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="required" for="children">{{ __('shop.refugees.create.kids') }}</label>
                                    <input class="form-control {{ $errors->has('children') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="children" id="children" value="{{ $uk->children }}" required>
                                    @error('children')
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="required" for="lastname">{{ __('shop.refugees.create.lastname') }}</label>
                                    <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="lastname" id="lastname" value="{{ $uk->lastname }}" required>
                                    @error('lastname')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="required" for="gender">{{ __('shop.refugees.create.gender.title') }}</label>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" id="gender1" name="gender" value="f" class="custom-control-input" @if ($uk->gender == "f") checked @endif>
                                        <label class="custom-control-label" for="gender1">{{ __('shop.refugees.create.gender.f') }}</label>
                                      </div>
                                      <div class="custom-control custom-radio mb-1">
                                        <input type="radio" id="gender2" name="gender" value="m" class="custom-control-input" @if ($uk->gender == "m") checked @endif>
                                        <label class="custom-control-label" for="gender2">{{ __('shop.refugees.create.gender.m') }}</label>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="address">{{ __('shop.refugees.create.address') }}</label>
                                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="address" id="address" value="{{ $uk->address }}">
                                    @error('address')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="required" for="stay">{{ __('shop.refugees.create.stay.title') }}</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="desire1" name="stay" value="tak" class="custom-control-input" @if ($uk->stay == "tak") checked @endif>
                                                <label class="custom-control-label" for="desire1">{{ __('shop.refugees.create.stay.yes') }}</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="desire2" name="stay" value="nie" class="custom-control-input" @if ($uk->stay == "nie") checked @endif>
                                                <label class="custom-control-label" for="desire2">{{ __('shop.refugees.create.stay.no') }}</label>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="desire3" name="stay" value="może" class="custom-control-input" @if ($uk->stay == "może") checked @endif>
                                                <label class="custom-control-label" for="desire3">{{ __('shop.refugees.create.stay.maybe') }}</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="desire4" name="stay" value="Nie wie" class="custom-control-input" @if ($uk->stay == "Nie wie") checked @endif>
                                                <label class="custom-control-label" for="desire4">{{ __('shop.refugees.create.stay.tdk') }}</label>
                                              </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="required" for="rfid">RFID</label>
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="required" for="remarks">{{ __('shop.refugees.create.remarks') }}</label>
                            <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="remarks" id="remarks" value="{{ $uk->remarks }}">
                            @error('remarks')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">{{ __('main.save') }}</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

      @include('footer')
    </div>
  </div>

@endsection


