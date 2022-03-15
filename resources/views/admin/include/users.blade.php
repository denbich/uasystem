<li class="nav-item">
    <a class="nav-link collapsed" href="#users" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="users">
      <i class="fas fa-user text-primary"></i>
      <span class="nav-link-text">Użytkownicy</span>
    </a>
    <div class="collapse" id="users" style="">
      <ul class="nav nav-sm flex-column">
        <li class="nav-item">
            <a href="{{ route('a.user.list') }}" class="nav-link">
              <span class="sidenav-normal"> Lista </span>
            </a>
          </li>
        <li class="nav-item">
          <a href="{{ route('a.user.search') }}" class="nav-link">
            <span class="sidenav-normal"> Wyszukaj </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('a.user.create') }}" class="nav-link">
            <span class="sidenav-normal"> Utwórz </span>
          </a>
        </li>
      </ul>
    </div>
  </li>
