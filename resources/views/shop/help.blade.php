@extends('layouts.app')

@section('title')
{{ __('Centrum pomocy') }}
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
            @include('shop.include.refugees')
          </ul>

          <hr class="my-3">
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Inne</span>
          </h6>

          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('s.settings') }}">
                    <i class="fas fa-cog text-primary"></i>
                    <span class="nav-link-text">Ustawienia</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('s.help_centre') }}">
                    <i class="fas fa-info-circle text-primary"></i>
                    <span class="nav-link-text">Centrum pomocy</span>
                </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="https://docs.google.com/spreadsheets/d/1SYVe6dfqVk0SOJyWWnXtlLcQJ3WMcv1rhHX8WuOMiYo/edit?usp=sharing" target="_blank">
                  <i class="fas fa-table text-primary"></i>
                  <span class="nav-link-text">Grafik dużurów</span>
              </a>
          </li>

            <li class="nav-item">
                <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-primary"></i>
                    <span class="nav-link-text">Wyloguj się</span>
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
                <h6 class="h2 text-white d-inline-block mb-0">Centrum pomocy</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('s.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Centrum pomocy</li>
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
                <div class="col">
                  <h3 class="mb-0">Pomoc</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h1 class="text-center mb-4">Kliknij na wybrany rozdział by zobaczyć szczegóły</h1>
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Jak dodać nowego uchodźcę?
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <ol>
                              <li>Z bocznego menu wybierz Uchodźcy <i class="fas fa-arrow-right"></i> Dodaj <br>
                                <a href="{{ url('help/1.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/1.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                              </li>
                              <li>Wypełniasz ankietę zgodnie z wytycznymi: <br>
                                <ul>
                                    <li>Jeśli uchodźca zarejestrował się w 28 dzielnicy: Imię, nazwisko, data urodzenia, informacja o dzieciach, w polu uwagi pisz: "info w 28 dzielnicy",</li>
                                    <li>Jeśli uchodźca NIE zarejestrował się w 28 dzielnicy: Imię, nazwisko, data urodzenia, numer telefonu, aktualny adres, informacja o pracy, informacja o chęci pozostania, informacja o dzieciach.</li>
                                </ul>
                                <a href="{{ url('help/2.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/2.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                                <li>Jeśli uchodźca posiada polski dokument tożsamości z wartwą elektroniczną (RFID), to poproś go o niego i postępuj zgodnie z wytycznymi w zakładce <a href="" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">"Jak korzystać z czytnika kart RFID?"</a></li>
                                <li>Klikasz przycisk "Utwórz" by dodać uchodźcę do systemu. <span class="text-danger">Uwaga! Nie musisz dodawać osobno wizyty - pierwsza wizyta dodaje się automatycznie.</span></li>
                                <a href="{{ url('help/3.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/3.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                                <li>Wydaj mapę Rybnika oraz talon na jedzenię i chemię.</li>
                            </li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Jak wyszukać uchodźcę?
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          <ol>
                              <li>Poproś o dokument tożsamości (Paszport, dowód, Diia),</li>
                              <li>Możesz wyszukać na 2 sposoby:
                                  <ul>
                                      <li>Z bocznego menu wybierając Uchodźcy <i class="fas fa-arrow-right"></i> Szukaj
                                        <a href="{{ url('help/4.png') }}" data-toggle="lightbox">
                                            <img src="{{ url('help/4.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                        </a>
                                        I wyszukujesz dane
                                        <a href="{{ url('help/5.png') }}" data-toggle="lightbox">
                                            <img src="{{ url('help/5.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                        </a>
                                      </li>
                                      <li>Bezpośrednio z górnego menu z paska wyszukiwania
                                        <a href="{{ url('help/6.png') }}" data-toggle="lightbox">
                                            <img src="{{ url('help/6.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                        </a>
                                      </li>
                                  </ul>
                              </li>
                              <li>Wyszukaj daną frazę i wyskoczą ci wyniki wyszukiwania
                                <a href="{{ url('help/7.png') }}" data-toggle="lightbox">
                                    <img src="{{ url('help/7.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                </a>
                              </li>
                              <li>uchodźcę możesz wyszukać po następujących danych:
                                  <ul>
                                      <li>Imię,</li>
                                      <li>Nazwisko,</li>
                                      <li>Data urodzenia (Format: RRRR-MM-DD),</li>
                                      <li>Cyfrowe dane: RFID, Diia, mObywatel.</li>
                                  </ul>
                              </li>
                              <li>Wytłumaczenie ikon w opcjach:
                                  <ul>
                                      <li><i class="fas fa-qrcode"></i> - Dodaj cyfrowe informacje <a href="" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">(Osobny artykuł "Jak dodać cyfrowe dane uchodźca?")</a></li>
                                      <li><i class="fas fa-plus"></i> - Dodaj wizytę <a href="" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">(Osobny artykuł "Jak dodać wizytę?")</a></li>
                                      <li><i class="fas fa-search"></i> - Zobacz wszystkie dane uchodźcy</li>
                                      <li><i class="fas fa-edit"></i> - Edytuj dane uchodźcy <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">(Osobny artykuł "Jak edytować dane uchodźcy?")</a></li>
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
                              Jak edytować dane uchodźcy?
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                            <ol>
                                <li>Wyszukaj uchodźca <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">(Osobny artykuł "Jak wyszukać uchodźcę?")</a> lub znajdź go na liście uchodźców (Uchodźcy <i class="fas fa-arrow-right"></i> lista),</li>
                                <li>Kliknij w ikonę <i class="fas fa-edit"></i> w opcjach
                                    <a href="{{ url('help/8.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/8.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>Edytuj dane i kliknij przycisk "Zapisz"
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
                              Jak dodać wizytę?
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                          <div class="card-body">
                            <ol>
                                <li>Wyszukaj uchodźca <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">(Osobny artykuł "Jak wyszukać uchodźcę?")</a> lub znajdź go na liście uchodźców (Uchodźcy <i class="fas fa-arrow-right"></i> lista),</li>
                                <li>Kliknij w ikonę <i class="fas fa-plus"></i> w opcjach
                                    <a href="{{ url('help/10.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/10.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>Zaznacz powody wizyty (Opcja ubrania jest zaznaczona domyślnie) i kliknij przycisk "Zatwierdź"
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
                              Jak dodać cyfrowe dane uchodźca? (Diia, mObywatel, Karta RFID)
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                          <div class="card-body">
                            <ol>
                                <li>Wyszukaj uchodźca <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">(Osobny artykuł "Jak wyszukać uchodźcę?")</a> lub znajdź go na liście uchodźców (Uchodźcy <i class="fas fa-arrow-right"></i> lista),</li>
                                <li>Kliknij w ikonę <i class="fas fa-qrcode"></i> w opcjach
                                    <a href="{{ url('help/12.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/12.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>Zaznacz odpowiednią opcję i wprowadź dane za pomocą skanera kodów QR lub czytnia kart RFID <a href="" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">(Osobny artykuł "Jak korzystać z czytnika kart RFID?")</a>
                                    <a href="{{ url('help/13.png') }}" data-toggle="lightbox">
                                        <img src="{{ url('help/13.png') }}" class="w-100 text-center my-2 img-fluid" alt="image">
                                    </a>
                                </li>
                                <li>By zapisać dane kliknij przycisk "Zapisz".</li>
                            </ol>
                          </div>
                        </div>
                      </div>
                    <div class="card">
                      <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseF">
                            Jak korzystać z czytnika kart RFID?
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


