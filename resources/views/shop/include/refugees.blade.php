<li class="nav-item">
    <a class="nav-link collapsed" href="#refugees" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="refugees">
      <i class="fas fa-users text-primary"></i>
      <span class="nav-link-text">{{ __('shop.sidemenu.general.refugees.title') }}</span>
    </a>
    <div class="collapse" id="refugees" style="">
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
        <li class="nav-item">
          <a href="{{ route('s.ukrainian.create') }}" class="nav-link">
            <span class="sidenav-normal"> {{ __('shop.sidemenu.general.refugees.add') }} </span>
          </a>
        </li>
      </ul>
    </div>
  </li>
