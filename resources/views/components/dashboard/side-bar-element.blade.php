<li class="nav-item @if ($page==$prefix) active @endif">
    <a class="nav-link" href="{{ $route?route($route):'#' }}" onclick="{{ $onclick??'' }}">
        <i class="material-icons">{{ $icon }}</i>
        <span class="sidebar-normal">{{ $title }}</span>
    </a>
</li>
