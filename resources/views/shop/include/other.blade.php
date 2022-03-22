<li class="nav-item">
    <a class="nav-link" href="{{ route('s.settings') }}">
        <i class="fas fa-cog text-primary"></i>
        <span class="nav-link-text">{{ __('shop.sidemenu.other.settings') }}</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('s.help_centre') }}">
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
