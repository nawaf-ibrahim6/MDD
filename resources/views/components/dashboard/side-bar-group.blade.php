<li class="nav-item">
    <a class="nav-link @if(strpos($page,$prefix)===0) collapsed @endif" data-toggle="collapse" href="#{{ $prefix }}" aria-expanded="{{ strpos($page,$prefix)===0 ? 'true':'false' }}">
        <i class="material-icons">{{ $icon }}</i>
        <p>{{ $title }} <b class="caret"></b></p>
    </a>
    <div class="collapse @if(strpos($page,$prefix)===0) show @endif" id="{{$prefix}}">
        <ul class="nav">
            {{--
            <li class="nav-item @if ($page=="users.add") active @endif">
                <a class="nav-link" href="{{ route('users.create') }}">
                    <i class="material-icons">add</i>
                    <span class="sidebar-normal">Add User</span>
                </a>
            </li>
            <li class="nav-item @if ($page=="users.view") active @endif">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="material-icons">view_list</i>
                    <span class="sidebar-normal">View Users</span>
                </a>
            </li>
            --}}
            {{ $slot }}
        </ul>
    </div>
</li>
