@extends('layouts.app')

@section('title')
{{ __('Edytuj dane uchodźca') }}
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
                <h6 class="h2 text-white d-inline-block mb-0">{{ __('main.refugee') }} #{{ $uk->id }}</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('shop.sidemenu.general.refugees.title') }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('s.ukrainian.create') }}">#{{ $uk->id }}</a></li>
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
                    <h3 class="text-center">Opcje</h3>
                    <a href="{{ route('s.ukrainian.edit', [$uk->id]) }}" class="btn btn-success w-100 my-2 text-white">{{ __('shop.refugees.edit.title') }}</a>
                    <hr class="my-2">
                        <a href="#modaluk" data-toggle="modal" data-target="#modaluk" class="btn btn-primary w-100 my-2">{{ __('shop.refugees.show.visitbutton') }}</a>
                        <a href="#modalukinfo" data-toggle="modal" data-target="#modalukinfo" class="btn btn-primary w-100 my-2">{{ __('shop.refugees.repeating.modaldata.title') }}</a>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                    <h3 class="text-center"></h3>
                    <h3 class="text-center">{{ __('shop.refugees.show.history') }}</h3>
                    <ul>
                    @foreach ($uk->ukrainian_visit as $visit)
                        <li>{{ $visit->created_at }} - @if ($visit->clothes == "1") {{ __('shop.refugees.list.clothes') }}, @endif @if ($visit->food == "1") {{ __('shop.refugees.list.food') }}, @endif @if ($visit->detergents == "1") {{ __('shop.refugees.list.detergents') }} @endif</li>
                    @endforeach
                </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-9 h-100 order-lg-1">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">{{ __('shop.refugees.show.title') }} </h3>
                    </div>
                    <div class="col-4 text-right">
                        <h3 class="mb-0">{{ __('shop.refugees.list.visits') }}: <span class="badge badge-primary">{{ $uk->ukrainian_visit_count }}</span></h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    @if (session('add_visit') == true)
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{ __('main.success') }}!</strong> {{ __('shop.refugees.alert.visit') }}</span>
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
                                <span class="alert-text"><strong>{{ __('main.success') }}!</strong> {{ __('shop.refugees.alert.data') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row pt-2">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.firstname') }}</label>
                                <p>@if ($uk->firstname == null) {{ __('main.null') }} @else{{ $uk->firstname }}@endif</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.birth') }}</label>
                                <p>{{ $uk->birth }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.telephone') }}</label>
                                <p>@if ($uk->telephone == null) {{ __('main.null') }} @else <a href="tel:{{ $uk->telephone }}">{{ $uk->telephone }}</a> @endif</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.work') }}</label>
                                <p>@if ($uk->work == null) {{ __('main.null') }} @else{{ $uk->work }}@endif</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.kids') }}</label>
                                <p>@if ($uk->children == null) {{ __('main.null') }} @else{{ $uk->children }}@endif</p>
                            </div>

                            <div class="mb-2">
                                <label class="font-weight-bold">mObywatel <i><img style="max-height: 25px;" src="https://www.gov.pl/img/icons/godlo-12.svg" alt=""></i></label>
                                <p>@if (empty($uk->mobywatel)) {{ __('main.null') }} @else {{ $uk->mobywatel }} @endif</p>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.lastname') }}</label>
                                <p>{{ $uk->lastname }}</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.gender.title') }}</label>
                                <p>@switch($uk->gender)
                                    @case('f') {{ __('shop.refugees.create.gender.f') }} @break
                                    @case('m') {{ __('shop.refugees.create.gender.m') }} @break
                                @endswitch</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.address') }}</label>
                                <p>@if ($uk->address == null) {{ __('main.null') }} @else{{ $uk->address }}@endif</p>
                            </div>
                            <div class="mb-2">
                                <label class="font-weight-bold">{{ __('shop.refugees.create.stay.title') }}</label>
                                <p>{{ $uk->stay }}</p>
                            </div>

                            <div class="mb-2">
                                <label class="font-weight-bold">RFID</label>
                                <p>@if (empty($uk->rfid)) {{ __('main.null') }} @else {{ $uk->rfid }} @endif</p>
                            </div>

                            <div class="mb-2">
                                <label class="font-weight-bold w-100">Diia (Дія) <i><img style="max-height: 25px;" src="https://plan2.diia.gov.ua/assets/img/main/diya.svg" alt=""></i></label>
                                <p>@if (empty($uk->diia)) {{ __('main.null') }} @else {{ $uk->diia }} @endif</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="font-weight-bold text-center w-100">{{ __('shop.refugees.create.remarks') }}</label>
                        <p>@if (empty($uk->remarks)) {{ __('main.null') }} @else {{ $uk->remarks }} @endif</p>
                    </div>
                </div>
              </div>
            </div>
          </div>

      @include('footer')
    </div>
  </div>

  <div class="modal fade" id="modaluk" tabindex="-1" role="dialog" aria-labelledby="labelmodaluk" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('s.ukrainian.addvisit', [$uk->id]) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="labelmodaluk">{{ __('shop.refugees.repeating.modalvisit.reason') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Check1" name="clothes" checked>
                        <label class="custom-control-label" for="Check1">{{ __('shop.refugees.list.clothes') }}</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Check2" name="food">
                        <label class="custom-control-label" for="Check2">{{ __('shop.refugees.list.food') }}</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Check3" name="detergents">
                        <label class="custom-control-label" for="Check3">{{ __('shop.refugees.list.detergents') }}</label>
                      </div>
                      <div class="mt-3">
                        <h3>{{ __('shop.refugees.repeating.modalvisit.shopvisits') }}</h3>
                        <div class="alert alert-secondary" role="alert">
                            <ul>
                                @forelse ($uk->ukrainian_visit as $visit)
                                <li>
                                    {{ $visit->created_at }} -
                                    @if ($visit->food == 1) {{ __('shop.refugees.list.food') }}, @endif
                                    @if ($visit->detergents == 1) {{ __('shop.refugees.list.detergents') }}, @endif
                                    @if ($visit->clothes == 1) {{ __('shop.refugees.list.clothes') }} @endif
                                </li>
                            @empty
                                <h4 class="text-danger">{{ __('shop.refugees.list.novisits') }}</h4>
                            @endforelse
                            </ul>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('main.confirm') }}</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div class="modal fade" id="modalukinfo" tabindex="-1" role="dialog" aria-labelledby="labelmodalukinfo" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="{{ route('s.ukrainian.digital', [$uk->id]) }}" method="post">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="labelmodalukinf">{{ __('shop.refugees.repetaing.modaldata.title') }}</h5>
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
                    <input class="form-control {{ $errors->has('mobywatel') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="mobywatel" id="mobywatel" value="{{ $uk->mobywatel }}">
                    @error('mobywatel')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
              </div>
          </form>
        </div>
      </div>
    </div>

@endsection
