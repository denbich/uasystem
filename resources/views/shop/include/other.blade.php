<li class="nav-item">
    <a class="nav-link" href="{{ route('s.settings') }}">
        <i class="fas fa-cog text-primary"></i>
        <span class="nav-link-text">Ustawienia</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('s.help_centre') }}">
        <i class="fas fa-info-circle text-primary"></i>
        <span class="nav-link-text">Centrum pomocy</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt text-primary"></i>
        <span class="nav-link-text">Wyloguj się</span>
    </a>
</li>
