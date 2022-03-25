@extends('layouts.app')

@section('title')
{{ __('shop.refugees.create.title') }}
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
                    <li class="nav-item">
                        <a href="{{ route('s.ukrainian.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('shop.sidemenu.general.refugees.list') }} </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('s.ukrainian.search') }}" class="nav-link">
                        <span class="sidenav-normal"> {{ __('shop.sidemenu.general.refugees.search') }} </span>
                      </a>
                    </li>
                    <li class="nav-item active">
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
                <h6 class="h2 text-white d-inline-block mb-0">{{ __('shop.refugees.create.title') }}</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('shop.sidemenu.general.refugees.title') }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('s.ukrainian.create') }}">{{ __('shop.sidemenu.general.refugees.add') }}</a></li>
                  </ol>
                </nav>
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
                <div class="col-6">
                  <h3 class="mb-0">{{ __('shop.refugees.create.title') }} </h3>
                </div>
                <div class="col-6 text-right d-inline">

                  <a href="#generatemodal" data-toggle="modal" data-target="#generatemodal" class="btn btn-sm btn-primary d-none"><i class="fas fa-clipboard-list"></i> Generuj listę</a>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="digitalcheckbox">
                    <label class="custom-control-label" for="digitalcheckbox">{{ __('shop.refugees.create.checkbox') }}</label>
                  </div>
                </div>
              </div>
            </div>
              <div class="card-body">
                @if (session('created_ukrainian') == true)
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{ __('main.success') }}!</strong> {{ __('shop.refugees.create.alert') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <form action="{{ route('s.ukrainian.store') }}" method="post">
                            @csrf
                            <div class="form-group refugeequestion">
                                <label class="required" for="lastname">Pytania na wstęp:</label>
                                <ul>
                                    <li>Ви вперше тут? (Wy wpersze tut?) - Czy pani jest tu pierwszy raz?</li>
                                    <li>У вас є закордонний паспорт? (U was je zakordonnyj pasport?) - Czy ma Pani zagraniczny paszport?</li>
                                    <li>У вас є дія? (U was je Dija?) - Czy Pani ma Diię? (Ukraiński mObywatel)</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <h2>{{ __('shop.refugees.create.question') }}</h2>
                                <label class="custom-toggle">
                                    <input type="checkbox" id="dzielnicacheckbox">
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="{{ __('shop.refugees.create.stay.no') }}" data-label-on="{{ __('shop.refugees.create.stay.yes') }}"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="required" for="lastname">{{ __('shop.refugees.create.lastname') }}</label>
                                <p class="font-italic refugeequestion">Як вас звати? (Jak was zwaty?) - Jak się Pani/Pan nazywa?</p>
                                <input class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="lastname" id="lastname" value="{{ old('lastname', '') }}" required>
                                @error('lastname')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required" for="firstname">{{ __('shop.refugees.create.firstname') }}</label>
                                <input class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="firstname" id="firstname" value="{{ old('firstname', '') }}" required>
                                @error('firstname')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="required" for="birth">{{ __('shop.refugees.create.birth') }}</label>
                                <p class="font-italic refugeequestion">Яка у вас дата народження? (Jaka u was data narodżenja?) - Jaka jest Pani data urodzenia?</p>
                                <input class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}" maxlength="255" type="date" name="birth" id="birth" value="{{ old('birth', '') }}" required>
                                @error('birth')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="required" for="gender">{{ __('shop.refugees.create.gender.title') }}</label>
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio" id="gender1" name="gender" value="f" class="custom-control-input" required>
                                    <label class="custom-control-label" for="gender1">{{ __('shop.refugees.create.gender.f') }}</label>
                                  </div>
                                  <div class="custom-control custom-radio mb-1">
                                    <input type="radio" id="gender2" name="gender" value="m" class="custom-control-input">
                                    <label class="custom-control-label" for="gender2">{{ __('shop.refugees.create.gender.m') }}</label>
                                  </div>
                                  @error('gender')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="hidethis" class="">
                                <div class="form-group">
                                    <label class="required" for="telephone">{{ __('shop.refugees.create.telephone') }}</label>
                                    <p class="font-italic refugeequestion">Який у вас номер телефону? Чи польський номер? Якщо ні, то український. (Jakij u was nomjer telefonu? Czy polskij nomjer? Jakszczo ni to ukraiński) - Jaki jest Pani numer telefonu? Polski numer jest? Jeśli nie to ukraiński.</p>
                                    <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" maxlength="255" type="tel" name="telephone" id="telephone" value="{{ old('telephone', '') }}">
                                    @error('telephone')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="required" for="address">{{ __('shop.refugees.create.address') }}</label>
                                    <p class="font-italic refugeequestion">Яка ваша зараз адреса в Польщі? (Jaka wasza zaraz adrjesa w polszczi?) - Jaki jest Pani adres w Polsce?</p>
                                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="address" id="address" value="{{ old('address', '') }}">
                                    @error('address')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="required" for="work">{{ __('shop.refugees.create.work') }}</label>
                                    <p class="font-italic refugeequestion">Якою була ваша робота в Україні? (Jakoju byla wasza rabota w ukraini?) - Jaka była Pani praca w ukrainie?</p>
                                    <input class="form-control {{ $errors->has('work') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="work" id="work" value="{{ old('work', '') }}">
                                    @error('work')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="required" for="stay">{{ __('shop.refugees.create.stay.title') }}</label>
                                    <p class="font-italic refugeequestion">Хочеш залишитися в Польщі і працювати? (Wy chocze Zal'yszytica w polszczi i pracjuwati?) - Czy chce pani zostać w Polsce i pracować?</p>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" id="desire1" name="stay" value="tak" class="custom-control-input">
                                        <label class="custom-control-label" for="desire1">{{ __('shop.refugees.create.stay.yes') }}</label>
                                      </div>
                                      <div class="custom-control custom-radio mb-1">
                                        <input type="radio" id="desire2" name="stay" value="nie" class="custom-control-input">
                                        <label class="custom-control-label" for="desire2">{{ __('shop.refugees.create.stay.no') }}</label>
                                      </div>
                                      <div class="custom-control custom-radio mb-1">
                                        <input type="radio" id="desire3" name="stay" value="może" class="custom-control-input">
                                        <label class="custom-control-label" for="desire3">{{ __('shop.refugees.create.stay.maybe') }}</label>
                                      </div>
                                      <div class="custom-control custom-radio mb-1">
                                        <input type="radio" id="desire4" name="stay" value="Nie wie" class="custom-control-input">
                                        <label class="custom-control-label" for="desire4">{{ __('shop.refugees.create.stay.tdk') }}</label>
                                      </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="required" for="children">{{ __('shop.refugees.create.kids') }}</label>
                                <p class="font-italic refugeequestion">У вас є діти? (u was e dzjeci?) - Czy ma pani dzieci? <br> Скільки років дітям? (Skolki rokiw dietjam) - Ile dzieci mają lat?</p>
                                <input class="form-control {{ $errors->has('children') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="children" id="children" value="{{ old('children', '') }}" required>
                                @error('children')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="hidethisdigital" class="d-none">
                                <div class="form-group">
                                    <label class="required w-100" for="diia">Diia (Дія) <i><img style="max-height: 25px;" src="https://plan2.diia.gov.ua/assets/img/main/diya.svg" alt=""></i></label>
                                    <input class="form-control {{ $errors->has('diia') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="diia" id="diia" value="{{ old('diia', '') }}">
                                    @error('diia')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @if ($errors->first('diia') == "Taki diia już występuje.") <br> <a href="{{ route('s.ukrainian.search') }}?q={{ old('diia', '') }}" class="font-weight-bold">Przejdź do tej osoby klikając tutaj</a> @endif
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="required w-100" for="mobywatel">mObywatel <i><img style="max-height: 25px;" src="https://www.gov.pl/img/icons/godlo-12.svg" alt=""></i></label>
                                    <input class="form-control {{ $errors->has('mobywatel') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="mobywatel" id="mobywatel" value="{{ old('mobywatel', '') }}">
                                    @error('mobywatel')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="required" for="rfid">RFID</label>
                                    <input class="form-control {{ $errors->has('rfid') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="rfid" id="rfid" value="{{ old('rfid', '') }}">
                                    @error('rfid')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="required" for="remarks">{{ __('shop.refugees.create.remarks') }}</label>
                                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                                @error('remarks')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">{{ __('shop.refugees.create.button') }}</button>
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

@section('script')
<script>

        if ($.cookie("DisplayQuestions") == 'true')
        {
            $('.refugeequestion').removeClass('d-none');
        } else {
            $('.refugeequestion').addClass('d-none');
        }

        if ($.cookie("DisplayDigital") == 'true')
        {
            $('#hidethisdigital').removeClass('d-none');
            $('#digitalcheckbox').prop('checked', true);
        } else {
            $('#hidethisdigital').addClass('d-none');
            $('#digitalcheckbox').prop('checked', false);
        }

    $('#dzielnicacheckbox').change(function () {
        if ($('#dzielnicacheckbox').prop('checked'))
        {
            $('#hidethis').addClass('d-none');
            $('#remarks').val('Info w 28 dzielnicy');
        } else {
            $('#hidethis').removeClass('d-none');
            $('#remarks').val('');
        }
    });

    $('#digitalcheckbox').change(function () {
    if ($('#digitalcheckbox').prop('checked'))
    {
        $('#hidethisdigital').removeClass('d-none');
    } else {
        $('#hidethisdigital').addClass('d-none');
    }
    });
</script>

@endsection


