@extends('layouts.app')

@section('title')
{{ __('shop.sidemenu.other.help') }}
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('s.settings') }}">
                    <i class="fas fa-cog text-primary"></i>
                    <span class="nav-link-text">{{ __('shop.sidemenu.other.settings') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('s.help_centre') }}">
                    <i class="fas fa-info-circle text-primary"></i>
                    <span class="nav-link-text">{{ __('shop.sidemenu.other.help') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="https://docs.google.com/spreadsheets/d/1SYVe6dfqVk0SOJyWWnXtlLcQJ3WMcv1rhHX8WuOMiYo/edit?usp=sharing" target="_blank">
                    <i class="fas fa-table text-primary"></i>
                    <span class="nav-link-text">{{ __('shop.sidemenu.other.schedule') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-primary"></i>
                    <span class="nav-link-text">{{ __('main.logout') }}</span>
                </a>
            </li>
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
                <h6 class="h2 text-white d-inline-block mb-0">{{ __('shop.sidemenu.other.help') }}</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('shop.sidemenu.other.help') }}</li>
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
        <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{ __('shop.help.title') }}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h1 class="text-center mb-4">{{ __('shop.help.message') }} </h1>
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            {{ __('shop.help.1.title') }}
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <ol>
                              <li> {{ __('shop.help.1.11') }}<i class="fas fa-arrow-right"></i> {{ __('shop.help.1.12') }} <br>
                                <a href="{{ url('help/1.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/1.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                              </li>
                              <li>{{ __('shop.help.1.21') }} <br>
                                <ul>
                                    <li>{{ __('shop.help.1.22') }}</li>
                                    <li>{{ __('shop.help.1.23') }}</li>
                                </ul>
                                <a href="{{ url('help/2.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/2.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                                <li>{{ __('shop.help.1.31') }} <a href="" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">"{{ __('shop.help.6.title') }}"</a></li>
                                <li>{{ __('shop.help.1.41') }} <span class="text-danger">{{ __('shop.help.1.42') }}</span></li>
                                <a href="{{ url('help/3.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/3.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                                <li>{{ __('shop.help.1.51') }}</li>
                            </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">{{ __('shop.help.2.title') }}</button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          <ol>
                              <li>{{ __('shop.help.2.11') }}</li>
                              <li>{{ __('shop.help.2.21') }}
                                  <ul>
                                      <li>{{ __('shop.help.2.22') }} <i class="fas fa-arrow-right"></i> {{ __('shop.sidemenu.general.refugees.search') }}
                                        <a href="{{ url('help/4.png') }}" data-toggle="lightbox">
                                            <img src="{{ url('help/4.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                        </a>
                                        {{ __('shop.help.2.23') }}
                                        <a href="{{ url('help/5.png') }}" data-toggle="lightbox">
                                            <img src="{{ url('help/5.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                        </a>
                                      </li>
                                      <li>{{ __('shop.help.2.24') }}
                                        <a href="{{ url('help/6.png') }}" data-toggle="lightbox">
                                            <img src="{{ url('help/6.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                        </a>
                                      </li>
                                  </ul>
                              </li>
                              <li>{{ __('shop.help.2.31') }}
                                <a href="{{ url('help/7.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/7.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                              </li>
                              <li>{{ __('shop.help.2.41') }}
                                  <ul>
                                      <li>{{ __('shop.refugees.create.firstname') }},</li>
                                      <li>{{ __('shop.refugees.create.lastname') }},</li>
                                      <li>{{ __('shop.refugees.create.birth') }} (Format: RRRR-MM-DD),</li>
                                      <li>{{ __('shop.help.2.42') }}: RFID, Diia, mObywatel.</li>
                                  </ul>
                              </li>
                              <li>
                                  <ul>{{ __('shop.help.2.51') }}
                                      <li><i class="fas fa-qrcode"></i> - {{ __('shop.refugees.repeating.modaldata.title') }} <a href="" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">({{ __('shop.help.article') }} "{{ __('shop.help.6.title') }}")</a></li>
                                      <li><i class="fas fa-plus"></i> - {{ __('shop.refugees.show.visitbutton') }} <a href="" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">({{ __('shop.help.article') }} "{{ __('shop.help.4.title') }}")</a></li>
                                      <li><i class="fas fa-search"></i> - {{ __('shop.help.2.52') }}</li>
                                      <li><i class="fas fa-edit"></i> - {{ __('shop.refugees.edit.title') }} <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">({{ __('shop.help.article') }} "{{ __('shop.help.5.title') }}")</a></li>
                                  </ul>
                              </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ __('shop.help.3.title') }}
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                            <ol>
                                <li>{{ __('shop.topmenu.search') }} <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">({{ __('shop.help.article') }} "{{ __('shop.help.2.title') }}")</a> {{ __('shop.help.3.11') }} ({{ __('shop.sidemenu.general.refugees.title') }} <i class="fas fa-arrow-right"></i> {{ __('shop.sidemenu.general.refugees.list') }}),</li>
                                <li>{{ __('shop.help.3.21') }} <i class="fas fa-edit"></i> {{ __('shop.help.3.22') }}
                                    <a href="{{ url('help/8.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/8.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>{{ __('shop.help.3.31') }}
                                    <a href="{{ url('help/9.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/9.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                            </ol>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingFour">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                {{ __('shop.help.4.title') }}
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                          <div class="card-body">
                            <ol>
                                <li>{{ __('shop.topmenu.search') }} <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">({{ __('shop.help.article') }} "{{ __('shop.help.2.title') }}")</a> {{ __('shop.help.3.11') }} ({{ __('shop.sidemenu.general.refugees.title') }} <i class="fas fa-arrow-right"></i> {{ __('shop.sidemenu.general.refugees.list') }}),</li>
                                <li>{{ __('shop.help.3.21') }} <i class="fas fa-plus"></i> {{ __('shop.help.3.22') }}
                                    <a href="{{ url('help/10.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/10.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>{{ __('shop.help.4.11') }}
                                    <a href="{{ url('help/11.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/11.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                            </ol>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingFive">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseF">
                              {{ __('shop.help.5.title') }} (Diia, mObywatel, Karta RFID)
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                          <div class="card-body">
                            <ol>
                                <li>{{ __('shop.topmenu.search') }} <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">({{ __('shop.help.article') }} "{{ __('shop.help.2.title') }}")</a> {{ __('shop.help.3.11') }} ({{ __('shop.sidemenu.general.refugees.title') }} <i class="fas fa-arrow-right"></i> {{ __('shop.sidemenu.general.refugees.list') }}),</li>
                                <li>{{ __('shop.help.3.21') }} <i class="fas fa-qrcode"></i> {{ __('shop.help.3.22') }}
                                    <a href="{{ url('help/12.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/12.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>{{ __('shop.help.5.11') }} <a href="" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">({{ __('shop.help.article') }} "{{ __('shop.help.6.title') }}")</a>
                                    <a href="{{ url('help/13.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/13.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>{{ __('shop.help.5.21') }}</li>
                            </ol>
                          </div>
                        </div>
                      </div>
                    <div class="card">
                      <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseF">
                            {{ __('shop.help.6.title') }}
                          </button>
                        </h5>
                      </div>
                      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                        <div class="card-body">
                            Wkrótce
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
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
@endsection


